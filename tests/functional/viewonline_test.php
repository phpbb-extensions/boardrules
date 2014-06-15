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
class viewonline_test extends \phpbb_functional_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	* @access static
	*/
	static protected function setup_extensions()
	{
		return array('phpbb/boardrules');
	}

	public function setUp()
	{
		parent::setUp();
		$this->enable_boardrules();
		$this->add_lang_ext('phpbb/boardrules', array('boardrules_common', 'boardrules_controller'));
	}

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

		$this->purge_cache();
	}

	/**
	* Test viewonline page
	*
	* @access public
	*/
	public function test_viewonline_page()
	{
		$this->markTestSkipped('Travis is returning an unexpected "session_page" rules/rules instead of app.php/rules');

		// Send the admin to the Rules page
		$this->login();
		$crawler = self::request('GET', 'app.php/rules?sid={$this->sid}');
		$this->assertContains($this->lang('BOARDRULES_HEADER'), $crawler->filter('h2')->text());

		// Allow us to create and login a second user
		$this->sid = null;
		self::$cookieJar->clear();

		// Create user1 and send them to the Viewonline
		$this->create_user('user1');
		$this->login('user1');
		$crawler = self::request('GET', 'viewonline.php?sid={$this->sid}');

		// Is admin still viewing Rules page
		$this->assertContains('admin', $crawler->text());
		$this->assertContains($this->lang('BOARDRULES_VIEWONLINE'), $crawler->filter('.info')->text());
	}
}
