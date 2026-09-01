<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\migrations;

class v310_upgrade_test extends \phpbb_database_test_case
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\boardrules\operators\ruleset */
	protected $operator;

	protected static function setup_extensions()
	{
		return array('phpbb/boardrules');
	}

	public function getDataSet()
	{
		// Models a 3.0.1 board after schema migration: existing rules have no
		// publication row because that table did not exist in the old release.
		return $this->createXMLDataSet(__DIR__ . '/../operators/fixtures/ruleset.xml');
	}

	protected function setUp(): void
	{
		parent::setUp();
		$this->db = $this->new_dbal();
		$config = new \phpbb\config\config(array('boardrules.table_lock.boardrules_table' => 0));
		$lock = new \phpbb\lock\db('boardrules.table_lock.boardrules_table', $config, $this->db);
		$this->operator = new \phpbb\boardrules\operators\ruleset(
			$this->db,
			$lock,
			'phpbb_boardrules',
			'phpbb_boardrules_rulesets'
		);
	}

	public function test_legacy_rules_remain_published_and_new_ruleset_starts_draft(): void
	{
		self::assertTrue($this->operator->is_published('en'));

		$result = $this->db->sql_query("SELECT COUNT(*) AS ruleset_count
			FROM phpbb_boardrules_rulesets
			WHERE language_iso = 'en'");
		self::assertSame(0, (int) $this->db->sql_fetchfield('ruleset_count'));
		$this->db->sql_freeresult($result);

		self::assertTrue($this->operator->draft_if_empty('fr'));
		self::assertFalse($this->operator->is_published('fr'));

		$result = $this->db->sql_query("SELECT rules_published
			FROM phpbb_boardrules_rulesets
			WHERE language_iso = 'fr'");
		self::assertSame(0, (int) $this->db->sql_fetchfield('rules_published'));
		$this->db->sql_freeresult($result);
	}

	public function test_language_trees_are_renumbered_independently(): void
	{
		$sql = 'INSERT INTO phpbb_boardrules ' . $this->db->sql_build_array('INSERT', array(
			'rule_id' => 4,
			'rule_language' => 'de',
			'rule_left_id' => 7,
			'rule_right_id' => 10,
			'rule_parent_id' => 0,
			'rule_parents' => 'cached',
			'rule_anchor' => 'emoji-&#128512;',
			'rule_title' => 'Regeln &#128512;',
			'rule_message' => '',
			'rule_message_bbcode_uid' => '',
			'rule_message_bbcode_bitfield' => '',
			'rule_message_bbcode_options' => 7,
		));
		$this->db->sql_query($sql);
		$sql = 'INSERT INTO phpbb_boardrules ' . $this->db->sql_build_array('INSERT', array(
			'rule_id' => 5,
			'rule_language' => 'de',
			'rule_left_id' => 8,
			'rule_right_id' => 9,
			'rule_parent_id' => 4,
			'rule_parents' => 'cached',
			'rule_anchor' => 'kind',
			'rule_title' => 'Freundlich',
			'rule_message' => '',
			'rule_message_bbcode_uid' => '',
			'rule_message_bbcode_bitfield' => '',
			'rule_message_bbcode_options' => 7,
		));
		$this->db->sql_query($sql);

		global $phpbb_root_path, $phpEx;
		$factory = new \phpbb\db\tools\factory();
		$migration = new \phpbb\boardrules\migrations\v30x\m20_unicode_language_trees(
			new \phpbb\config\config(array()),
			$this->db,
			$factory->get($this->db, true),
			$phpbb_root_path,
			$phpEx,
			'phpbb_'
		);
		$migration->renumber_language_trees();

		$result = $this->db->sql_query('SELECT rule_id, rule_language, rule_left_id, rule_right_id, rule_parent_id, rule_parents, rule_title, rule_anchor
			FROM phpbb_boardrules
			ORDER BY rule_language, rule_left_id');
		$rules = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		self::assertSame(array('de', 'de', 'en', 'en', 'en'), array_column($rules, 'rule_language'));
		self::assertSame(array(1, 2, 1, 2, 4), array_map('intval', array_column($rules, 'rule_left_id')));
		self::assertSame(array(4, 3, 6, 3, 5), array_map('intval', array_column($rules, 'rule_right_id')));
		self::assertSame('Regeln &#128512;', $rules[0]['rule_title']);
		self::assertSame('emoji-&#128512;', $rules[0]['rule_anchor']);
		self::assertSame(array('', '', '', '', ''), array_column($rules, 'rule_parents'));
	}

	public function test_table_lock_config_is_removed_only_on_revert(): void
	{
		global $phpbb_root_path, $phpEx;
		$factory = new \phpbb\db\tools\factory();
		$migration = new \phpbb\boardrules\migrations\v30x\m20_unicode_language_trees(
			new \phpbb\config\config(array()),
			$this->db,
			$factory->get($this->db, true),
			$phpbb_root_path,
			$phpEx,
			'phpbb_'
		);

		foreach ($migration->update_data() as $instruction)
		{
			self::assertNotSame('config.add', $instruction[0]);
		}
		self::assertSame(array(
			array('config.remove', array('boardrules.table_lock.boardrules_table')),
		), $migration->revert_data());
	}

	public function test_unicode_schema_is_reversible(): void
	{
		global $phpbb_root_path, $phpEx;
		$factory = new \phpbb\db\tools\factory();
		$migration = new \phpbb\boardrules\migrations\v30x\m20_unicode_language_trees(
			new \phpbb\config\config(array()),
			$this->db,
			$factory->get($this->db, true),
			$phpbb_root_path,
			$phpEx,
			'phpbb_'
		);

		self::assertSame(array(
			'change_columns' => array(
				'phpbb_boardrules' => array(
					'rule_title' => array('VCHAR:200', ''),
					'rule_anchor' => array('VCHAR:255', ''),
				),
			),
		), $migration->revert_schema());
	}
}
