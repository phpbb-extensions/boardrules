<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\mock;

/**
* Mock rule operator
*/
class rule_operator extends \phpbb\boardrules\operators\rule
{
	public function __construct()
	{
	}

	public function get_rules($language = 0, $parent_id = 0)
	{
		return array();
	}

	public function add_rule($entity, $language = 0, $parent_id = 0)
	{
	}

	public function delete_rule($rule_id)
	{
	}

	public function move($rule_id, $direction = 'up', $amount = 1)
	{
	}

	public function get_rule_parents($language, $parent_id)
	{
	}
}
