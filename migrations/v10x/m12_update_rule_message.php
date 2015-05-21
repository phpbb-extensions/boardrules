<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\migrations\v10x;

/**
* Migration stage 12: Update the rule_message column type to MTEXT_UNI
*/
class m12_update_rule_message extends \phpbb\db\migration\migration
{
	/**
	* Assign migration file dependencies for this migration
	*
	* @return array Array of migration files
	* @static
	* @access public
	*/
	static public function depends_on()
	{
		return array(
			'\phpbb\boardrules\migrations\v10x\m1_initial_schema',
			'\phpbb\boardrules\migrations\v10x\m7_sample_rule_data',
		);
	}

	/**
	* Update boardrules table schema
	* Note: Do not revert this schema change or else an SQL error will occur
	* when purging data if a postgres or mssql db has a large rule message.
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return array(
			'change_columns'	=> array(
				$this->table_prefix . 'boardrules'	=> array(
					'rule_message'		=> array('MTEXT_UNI', ''),
				),
			),
		);
	}
}
