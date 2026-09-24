<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\operators;

class rule_operator_save_rule_test extends rule_operator_base
{
	public function test_get_and_save_rule()
	{
		$operator = $this->get_rule_operator();
		$entity = $operator->get_rule(1);
		$entity->set_title('Changed title');

		$saved = $operator->save_rule($entity);

		self::assertSame('Changed title', $saved->get_title());
		self::assertSame(array(), $saved->get_changes());
		self::assertSame('Changed title', $operator->get_rule(1)->get_title());
	}

	public function test_save_rule_rejects_new_entity()
	{
		$this->expectException(\phpbb\boardrules\exception\out_of_bounds::class);
		$this->expectExceptionMessage('rule_id');

		$this->get_rule_operator()->save_rule($this->entity_factory->create());
	}

	public function test_get_rule_rejects_unknown_id()
	{
		$this->expectException(\phpbb\boardrules\exception\out_of_bounds::class);
		$this->expectExceptionMessage('rule_id');

		$this->get_rule_operator()->get_rule(100);
	}

	public function test_save_unicode_rule_title()
	{
		$operator = $this->get_rule_operator();
		$entity = $operator->get_rule(1);
		$entity
			->set_anchor('emoji-title')
			->set_title('Emoji 😀 中文 Кириллица title');

		$saved = $operator->save_rule($entity);

		$result = $this->db->sql_query('SELECT rule_anchor, rule_title
			FROM phpbb_boardrules
			WHERE rule_id = 1');
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		self::assertSame('emoji-title', $row['rule_anchor']);
		self::assertSame(
			strpos($this->db->get_sql_layer(), 'mssql') === 0
				? 'Emoji &#128512; &#20013;&#25991; &#1050;&#1080;&#1088;&#1080;&#1083;&#1083;&#1080;&#1094;&#1072; title'
				: 'Emoji &#128512; 中文 Кириллица title',
			$row['rule_title']
		);
		self::assertSame('Emoji 😀 中文 Кириллица title', $saved->get_title());
	}

	public function test_create_rule_returns_fresh_entities()
	{
		$operator = $this->get_rule_operator();

		self::assertNotSame($operator->create_rule(), $operator->create_rule());
	}
}
