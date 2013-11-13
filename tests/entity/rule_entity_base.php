<?php
/**
*
* @package testing
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Base rule entity test (helper)
*/
class rule_entity_base extends \phpbb_test_case
{
	/**
	* Get the rule entity
	*
	* @return \phpbb\boardrules\entity\rule
	* @access protected
	*/
	protected function get_rule_entity()
	{
		return new \phpbb\boardrules\entity\rule();
	}
}
