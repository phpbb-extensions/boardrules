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
				'item_parents'	=> 'rule_parents',
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
	* @param int		$parent_id		Category to display rules from, 0  for all
	* @return array 	Array of rules data from the database
	* @access public
	*/
	public function get_rules_data($parent_id)
	{
		return ($parent_id) ? $this->get_subtree_data($parent_id) : $this->get_tree_data();
	}

	/**
	* Get all items from a tree in the database
	*
	* @param bool		$order_asc		Order the items ascending by their left_id
	* @return array		Array of items (containing all columns from the item table)
	*						ID => Item data
	* @access public
	*/
	public function get_tree_data($order_asc = true)
	{
		$rows = array();

		$sql = 'SELECT ' . implode(', ', $this->item_basic_data) . '
			FROM ' . $this->table_name . ' ' .
			$this->get_sql_where('WHERE') . '
			ORDER BY ' . $this->column_left_id . ' ' . ($order_asc ? 'ASC' : 'DESC');
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$rows[(int) $row[$this->column_item_id]] = $row;
		}
		$this->db->sql_freeresult($result);

		return $rows;
	}

	/**
	* Update the tree for an item inserted in the database
	*
	* @param int	$item_id	The item to be added
	* @return array		Array with updated data, if the item was added successfully
	*					Empty array otherwise
	* @access public
	*/
	public function add_to_nestedset($item_id)
	{
		return $this->add_item_to_nestedset($item_id);
	}
}