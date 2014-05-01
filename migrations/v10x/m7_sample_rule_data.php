<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\migrations\v10x;

/**
* Migration stage 7: Install sample rule data
*/
class m7_sample_rule_data extends \phpbb\db\migration\migration
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
		return array('\phpbb\boardrules\migrations\v10x\m6_initial_module');
	}

	/**
	* Add or update data in the database
	*
	* @return array Array of table data
	* @access public
	*/
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'insert_sample_rule_data'))),
		);
	}

	/**
	* Custom function to install sample rule data to the boardrules table in the database
	*
	* @return null
	* @access public
	*/
	public function insert_sample_rule_data()
	{
		// Check if boardrules table exists and already has data
		if ($this->db_tools->sql_table_exists($this->table_prefix . 'boardrules'))
		{
			$sql = 'SELECT * FROM ' . $this->table_prefix . 'boardrules';
			$result = $this->db->sql_query_limit($sql, 1);
			$row = $this->db->sql_fetchrow($result);
			if (!empty($row))
			{
				return;
			}
		}
		else
		{
			return;
		}

		// Get the lang_id of the board's default language
		$sql = 'SELECT lang_id
			FROM ' . LANG_TABLE . "
			WHERE lang_iso = '" . $this->db->sql_escape($this->config['default_lang']) . "'";
		$result = $this->db->sql_query($sql);
		$default_lang_id = (int) $this->db->sql_fetchfield('lang_id');
		$this->db->sql_freeresult($result);

		// Define sample rule data
		$sample_rule_data = array(
			array(
				'rule_title' => 'Example Rule Category',
				'rule_message' => 'This is an example category in your Board Rules installation. Categories contain groups of related rules. Category messages (like this) are not displayed on the rules page.',
				'rule_anchor' => 'example-rule-category',
				'rule_id' => 1,
				'rule_left_id' => 1,
				'rule_right_id' => 4,
				'rule_parent_id' => 0,
				'rule_language' => $default_lang_id,
				'rule_parents' => '',
			),
			array(
				'rule_title' => 'Example Rule',
				'rule_message' => 'This is an example rule in your Board Rules installation. Everything seems to be working. You may edit or delete this rule and category and continue to set up your own board rules.',
				'rule_anchor' => 'example-rule',
				'rule_id' => 2,
				'rule_left_id' => 2,
				'rule_right_id' => 3,
				'rule_parent_id' => 1,
				'rule_language' => $default_lang_id,
				'rule_parents' => '',
			),
		);

		// Insert sample rule data
		$sql = $this->db->sql_multi_insert($this->table_prefix . 'boardrules', $sample_rule_data);
		$this->db->sql_query($sql);
	}
}
