<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\functional;

/**
* @group functional
*/
class registration_event_test extends boardrules_functional_base
{
	/**
	* Board rules installs in a disabled state. We need to turn it on to test it.
	*
	* @access public
	*/
	public function enable_boardrules()
	{
		$this->get_db();

		$sql = "UPDATE phpbb_config
			SET config_value = '1'
			WHERE config_name = 'boardrules_enable'";

		$this->db->sql_query($sql);

		$sql = "UPDATE phpbb_config
			SET config_value = '1'
			WHERE config_name = 'boardrules_require_at_registration'";

		$this->db->sql_query($sql);

		$this->purge_cache();
	}

	/**
	* Test for presence of the Rules at registration event
	*
	* @access public
	*/
	public function test_boardrules_at_registration()
	{
		$crawler = self::request('GET', 'ucp.php?mode=register');

		$this->assertContains($this->lang('BOARDRULES_AGREEMENT'), $crawler->filter('.content')->text());
	}
}
