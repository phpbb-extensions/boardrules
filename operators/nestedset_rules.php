<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\operators;

/**
* Nestedset class for Board Rules
*/
class nestedset_rules extends \phpbb\tree\nestedset
{
	/**
	* Construct
	*
	* @param \phpbb\db\driver\driver	$db		Database connection
	* @param \phpbb\lock\db		$lock	Lock class used to lock the table when moving forums around
	* @param string				$table_name		Table name
	* @return \phpbb\boardrules\operators\nestedset_rules
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver $db, \phpbb\lock\db $lock, $table_name)
	{
		parent::__construct(
			$db,
			$lock,
			$table_name,
			'RULES_NESTEDSET_',
			'',
			array(),
			array(
				'item_id'		=> 'rule_id',
				'parent_id'		=> 'rule_parent_id',
				'left_id'		=> 'rule_left_id',
				'right_id'		=> 'rule_right_id',
			)
		);
	}

	/**
	* Set additional sql where restrictions to use the language id
	*
	* @param int        $language        The language selection identifier; default: 0
	* @return string    Returns additional where statements to narrow down the tree,
	*                       prefixed with operator and prepended column_prefix to column names
	* @access public
	*/
	public function use_language($language)
	{
		$this->sql_where = '%srule_language = ' . (int) $language;

		return $this;
	}

	/**
	* Get the rules data from the database
	*
	* @param int		$parent_id		Category to display rules from
	* @return array 	Array of rules data from the database
	* @access public
	*/
	public function get_rules_data($parent_id)
	{
		$this->column_item_id = 'rule_parent_id';

		return $this->get_tree_data($parent_id);
	}
}
