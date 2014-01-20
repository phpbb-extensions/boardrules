<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\operators;

class nestedset_rules extends \phpbb\tree\nestedset
{
	/**
	* Construct
	*
	* @param \phpbb\db\driver\driver	$db		Database connection
	* @param \phpbb\lock\db		$lock	Lock class used to lock the table when moving forums around
	* @param string				$table_name		Table name
	* @param int				$language		The language selection identifier; default: 0
	*/
	public function __construct(\phpbb\db\driver\driver $db, \phpbb\lock\db $lock, $table_name, $language = 0)
	{
		$this->language = $language;

		parent::__construct(
			$db,
			$lock,
			$table_name,
			'RULES_NESTEDSET_',
			'%srule_language = ' . $this->language,
			array(),
			array(
				'item_id'		=> 'rule_parent_id',
				'parent_id'		=> 'rule_parent_id',
				'left_id'		=> 'rule_left_id',
				'right_id'		=> 'rule_right_id',
			)
		);
	}

	public function set_language($language)
	{
		$this->language = (int) $language;
		return $this;
	}
}
