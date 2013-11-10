<?php
/**
*
* @package testing
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

class rule_entity_base extends \phpbb_test_case
{
	protected function get_rule_entity()
	{
		return new \phpbb\boardrules\entity\rule();
	}
}
