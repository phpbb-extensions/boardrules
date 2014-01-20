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
	* @param int				$language		The language selection identifier
	*/
	public function __construct(\phpbb\db\driver\driver $db, \phpbb\lock\db $lock, $table_name, $language)
	{
		parent::__construct(
			$db,
			$lock,
			$table_name,
			'RULES_NESTEDSET_',
			'i1.rule_language = ' . (int) $language,
			array(
				'rule_id',
				'rule_language',
				'rule_title',
			),
			array(
				'item_id'		=> 'rule_parent_id',
				'item_parents'	=> 'rule_parents',
				'left_id'		=> 'rule_left_id',
				'right_id'		=> 'rule_right_id',
			)
		);
	}
}
