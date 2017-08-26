<?php
/**
 *
 * Board Rules extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardrules\migrations\v20x;

class m15_update_lang_schema extends \phpbb\db\migration\migration
{
	/**
	 * @inheritDoc
	 *
	 * This migration is incompatible with PostgreSQL
	 */
	public function effectively_installed()
	{
		return $this->db->get_sql_layer() === 'postgres';
	}

	/**
	 * @inheritDoc
	 */
	static public function depends_on()
	{
		return array(
			'\phpbb\boardrules\migrations\v10x\m7_sample_rule_data',
			'\phpbb\boardrules\migrations\v20x\m14_reparse',
		);
	}

	/**
	 * @inheritDoc
	 */
	public function update_schema()
	{
		return array(
			'change_columns' => array(
				$this->table_prefix . 'boardrules' => array(
					'rule_language' => array('VCHAR:30', ''),
				),
			),
			'add_index' => array(
				$this->table_prefix . 'boardrules' => array(
					'rule_language' => array('rule_language'),
				),
			),
		);
	}

	/**
	 * @inheritDoc
	 */
	public function revert_schema()
	{
		return array(
			'drop_keys' => array(
				$this->table_prefix . 'boardrules' => array(
					'rule_language',
				),
			),
		);
	}

	/**
	 * @inheritDoc
	 */
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'change_rule_language'))),
		);
	}

	/**
	 * Change rule_language values from lang_id to lang_iso
	 */
	public function change_rule_language()
	{
		$helper = new \phpbb\boardrules\migrations\helper($this->db, $this->table_prefix);
		$helper->change_rule_language('rule_language', 'rule_language');
	}
}
