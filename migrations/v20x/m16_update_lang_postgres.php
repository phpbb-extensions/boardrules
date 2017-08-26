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

class m16_update_lang_postgres extends \phpbb\db\migration\migration
{
	/**
	 * @inheritDoc
	 *
	 * This migration is only for PostgreSQL
	 */
	public function effectively_installed()
	{
		return strpos($this->db->get_sql_layer(), 'postgres') === false;
	}

	/**
	 * @inheritDoc
	 */
	static public function depends_on()
	{
		return array(
			'\phpbb\boardrules\migrations\v10x\m7_sample_rule_data',
			'\phpbb\boardrules\migrations\v20x\m14_reparse',
			'\phpbb\boardrules\migrations\v20x\m15_update_lang_schema',
		);
	}

	/**
	 * @inheritDoc
	 */
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'alter_rule_language'))),
		);
	}

	/**
	 * Alter rule_language column for PostgreSQL
	 *
	 * PostgreSQL does not allow us to change a column's data type if it
	 * already contains values, so the normal 'change_columns' action fails.
	 * To work around this, we re-create a new rule_language column with
	 * the new data type and copy the new data to it via specific queries.
	 *
	 * @throws \RuntimeException
	 */
	public function alter_rule_language()
	{
		// Ensure we are only processing this on postgresql dbms
		if (strpos($this->db->get_sql_layer(), 'postgres') === false)
		{
			return;
		}

		$boardrules_table = $this->table_prefix . 'boardrules';

		// Rename existing column to a temporary name
		$sql = 'ALTER TABLE ' . $boardrules_table . ' 
			RENAME COLUMN rule_language TO old_rule_language';
		$this->db->sql_query($sql);

		// Stop running if column rename failed (custom language must be hardcoded)
		if (!$this->db_tools->sql_column_exists($boardrules_table , 'old_rule_language'))
		{
			throw new \RuntimeException('The column ‘rule_language’ could not be renamed.');
		}

		// Add a new rule_language column
		$this->db_tools->sql_column_add($boardrules_table, 'rule_language', array('VCHAR:30', ''));

		// Stop running if add column failed (custom language must be hardcoded)
		if (!$this->db_tools->sql_column_exists($boardrules_table, 'rule_language'))
		{
			throw new \RuntimeException('The column ‘rule_language’ could not be created.');
		}

		// Add an index for the rule_language column
		$this->db_tools->sql_create_index($boardrules_table, 'rule_language', array('rule_language'));

		// Set the new rule_language values
		$helper = new \phpbb\boardrules\migrations\helper($this->db, $this->table_prefix);
		$helper->change_rule_language('rule_language', 'old_rule_language');

		// Drop the temporary column
		$this->db_tools->sql_column_remove($boardrules_table, 'old_rule_language');
	}
}
