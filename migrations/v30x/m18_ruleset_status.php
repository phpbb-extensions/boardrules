<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\migrations\v30x;

class m18_ruleset_status extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->db_tools->sql_table_exists($this->table_prefix . 'boardrules_rulesets');
	}

	public static function depends_on()
	{
		return array(
			'\phpbb\boardrules\migrations\v20x\m16_update_lang_postgres',
			'\phpbb\boardrules\migrations\v20x\m17_list_style',
		);
	}

	public function update_schema()
	{
		return array(
			'add_tables' => array(
				$this->table_prefix . 'boardrules_rulesets' => array(
					'COLUMNS' => array(
						'language_iso' => array('VCHAR:30', ''),
						'rules_published' => array('BOOL', 1),
						'rules_intro_text' => array('MTEXT_UNI', ''),
					),
					'PRIMARY_KEY' => 'language_iso',
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_tables' => array(
				$this->table_prefix . 'boardrules_rulesets',
			),
		);
	}
}
