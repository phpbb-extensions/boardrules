<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\operators;

class ruleset_operator_test extends \phpbb_database_test_case
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\boardrules\operators\ruleset */
	protected $operator;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\lock\db */
	protected $lock;

	protected static function setup_extensions()
	{
		return array('phpbb/boardrules');
	}

	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/fixtures/ruleset.xml');
	}

	protected function setUp(): void
	{
		parent::setUp();
		$this->db = $this->new_dbal();
		$this->config = new \phpbb\config\config(array('boardrules.table_lock.boardrules_table' => 0));
		$this->lock = new \phpbb\lock\db('boardrules.table_lock.boardrules_table', $this->config, $this->db);
		$this->operator = new \phpbb\boardrules\operators\ruleset(
			$this->db,
			$this->lock,
			'phpbb_boardrules',
			'phpbb_boardrules_rulesets'
		);
	}

	public function test_get_languages_defaults_existing_rulesets_to_published(): void
	{
		$languages = $this->operator->get_languages();

		self::assertSame('en', $languages[0]['lang_iso']);
		self::assertSame(3, $languages[0]['rule_count']);
		self::assertTrue($languages[0]['published']);
		self::assertSame('fr', $languages[1]['lang_iso']);
		self::assertSame(0, $languages[1]['rule_count']);
	}

	public function test_copy_clones_complete_tree_as_draft(): void
	{
		self::assertSame(array(
			'rule_count' => 3,
			'renamed_anchors' => 0,
		), $this->operator->copy('en', 'fr'));
		self::assertFalse($this->operator->is_published('fr'));

		$sql = "SELECT *
			FROM phpbb_boardrules
			WHERE rule_language = 'fr'
			ORDER BY rule_left_id";
		$result = $this->db->sql_query($sql);
		$rules = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		self::assertCount(3, $rules);
		self::assertSame(array('General', 'Be kind', 'Stay on topic'), array_column($rules, 'rule_title'));
		self::assertSame(array(7, 8, 10), array_map('intval', array_column($rules, 'rule_left_id')));
		self::assertSame(array(12, 9, 11), array_map('intval', array_column($rules, 'rule_right_id')));
		self::assertSame((int) $rules[0]['rule_id'], (int) $rules[1]['rule_parent_id']);
		self::assertSame((int) $rules[0]['rule_id'], (int) $rules[2]['rule_parent_id']);
		self::assertSame('', $rules[1]['rule_parents']);
		self::assertSame('Be [b:abcd1234]kind[/b:abcd1234].', $rules[1]['rule_message']);
		self::assertSame('abcd1234', $rules[1]['rule_message_bbcode_uid']);

		$result = $this->db->sql_query('SELECT rule_left_id, rule_right_id FROM phpbb_boardrules');
		$all_rules = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);
		$bounds = array_merge(array_column($all_rules, 'rule_left_id'), array_column($all_rules, 'rule_right_id'));
		self::assertCount(count($bounds), array_unique($bounds));
	}

	public function test_copy_appends_to_non_empty_target(): void
	{
		$this->operator->copy('en', 'fr');
		self::assertSame(array(
			'rule_count' => 3,
			'renamed_anchors' => 3,
		), $this->operator->copy('en', 'fr'));

		$sql = "SELECT *
			FROM phpbb_boardrules
			WHERE rule_language = 'fr'
			ORDER BY rule_left_id";
		$result = $this->db->sql_query($sql);
		$rules = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		self::assertCount(6, $rules);
		self::assertSame(array(7, 8, 10, 13, 14, 16), array_map('intval', array_column($rules, 'rule_left_id')));
		self::assertSame(array(12, 9, 11, 18, 15, 17), array_map('intval', array_column($rules, 'rule_right_id')));
		self::assertSame(array('general', 'be-kind', 'stay-topic', 'general-2', 'be-kind-2', 'stay-topic-2'), array_column($rules, 'rule_anchor'));
		self::assertSame((int) $rules[3]['rule_id'], (int) $rules[4]['rule_parent_id']);
		self::assertSame((int) $rules[3]['rule_id'], (int) $rules[5]['rule_parent_id']);
	}

	public function test_copy_rejects_when_nestedset_lock_is_held(): void
	{
		$competing_lock = new \phpbb\lock\db('boardrules.table_lock.boardrules_table', $this->config, $this->db);
		self::assertTrue($competing_lock->acquire());

		try
		{
			$this->operator->copy('en', 'fr');
			self::fail('Copy should not run while the nested-set lock is held.');
		}
		catch (\RuntimeException $e)
		{
			self::assertSame('RULES_NESTEDSET_LOCK_FAILED_ACQUIRE', $e->getMessage());
		}
		finally
		{
			$competing_lock->release();
		}

		self::assertSame(0, $this->operator->get_languages()[1]['rule_count']);
	}

	public function test_copy_releases_nestedset_lock(): void
	{
		$this->operator->copy('en', 'fr');

		self::assertSame('0', (string) $this->config['boardrules.table_lock.boardrules_table']);
	}

	public function test_copy_rejects_empty_source(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('ACP_BOARDRULES_COPY_SOURCE_EMPTY');
		$this->operator->copy('de', 'fr');
	}

	public function test_publication_state_can_change(): void
	{
		$this->operator->copy('en', 'fr');
		$this->operator->set_published('fr', true);
		self::assertTrue($this->operator->is_published('fr'));

		$this->operator->set_published('fr', false);
		self::assertFalse($this->operator->is_published('fr'));
	}

	public function test_empty_ruleset_cannot_be_published(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('ACP_BOARDRULES_STATUS_CHANGE_EMPTY');
		$this->operator->set_published('fr', true);
	}

	/**
	 * @dataProvider invalid_copy_language_data
	 */
	public function test_copy_rejects_invalid_languages($source, $target): void
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('ACP_BOARDRULES_COPY_INVALID_LANGUAGE');
		$this->operator->copy($source, $target);
	}

	public static function invalid_copy_language_data(): array
	{
		return array(
			'same language' => array('en', 'en'),
			'unknown source' => array('xx', 'fr'),
			'unknown target' => array('en', 'xx'),
			'non-string values' => array(null, false),
		);
	}

	public function test_unknown_ruleset_cannot_change_publication_state(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('ACP_BOARDRULES_INVALID_LANGUAGE');
		$this->operator->set_published('xx', true);
	}

	public function test_empty_anchor_remains_empty(): void
	{
		$method = new \ReflectionMethod($this->operator, 'make_unique_anchor');
		$used = array();
		self::assertSame('', $method->invokeArgs($this->operator, array('', &$used, array())));
		self::assertSame(array(), $used);
	}
}
