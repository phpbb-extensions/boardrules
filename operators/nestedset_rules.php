<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
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
	* @param \phpbb\db\driver\driver_interface $db Database connection
	* @param \phpbb\lock\db $lock Lock class used to lock the table when moving forums around
	* @param string $table_name Table name
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\lock\db $lock, $table_name)
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
	* @param int $language The language selection identifier; default: 0
	* @return nestedset_rules $this object for chaining calls
	* @access public
	*/
	public function use_language($language)
	{
		$this->sql_where = "%srule_language = '" . $this->db->sql_escape($language) . "'";

		return $this;
	}

	/**
	* Get the rules data from the database
	*
	* @param int $parent_id Category to display rules from, 0 for all
	* @return array Array of rules data from the database
	* @access public
	*/
	public function get_rules_data($parent_id)
	{
		return $parent_id ? $this->get_subtree_data($parent_id, true, false) : $this->get_all_tree_data();
	}

	/**
	* Update the tree for an item inserted in the database
	*
	* @param int $item_id The item to be added
	* @return array Array with updated data, if the item was added successfully
	*				Empty array otherwise
	* @access public
	*/
	public function add_to_nestedset($item_id)
	{
		return $this->add_item_to_nestedset($item_id);
	}
}
