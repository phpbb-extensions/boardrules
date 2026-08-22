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
}
