<?php
/**
*
* @package testing
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\functional;

/**
* @group functional
*/
class viewonline_test extends \extension_functional_test_case
{
	public function setUp()
	{
		parent::setUp();
		$this->login();
		$this->admin_login();
		$this->set_extension('phpbb', 'boardrules', 'Board Rules');
		$this->enable_extension();
		$this->enable_boardrules();
		$this->add_lang_ext(array('boardrules_common', 'boardrules_controller'));
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
	}

	/**
	* Test viewonline page
	*
	* @access public
	*/
	public function test_viewonline_page()
	{
		$crawler = self::request('GET', 'app.php/rules&sid={$this->sid}');
		$this->assertContains($this->lang('BOARDRULES_HEADER'), $crawler->text());

		$this->sid = null;
		self::$cookieJar->clear();

		$this->create_user('user1');
		$this->login('user1');
		$crawler = self::request('GET', 'viewonline.php&sid={$this->sid}');

		$this->assertContains('admin', $crawler->text());
		$this->assertContains($this->lang('BOARDRULES_VIEWONLINE'), $crawler->text());
	}
}
