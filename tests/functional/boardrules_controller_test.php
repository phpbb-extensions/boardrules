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
class boardrules_controller_test extends \phpbb_functional_test_case
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
	* Test loading the rules page
	*
	* @access public
	*/
	public function test_boardrules_page()
	{
		$crawler = self::request('GET', 'app.php/rules');
		$this->assertContains($this->lang('BOARDRULES_HEADER'), $crawler->filter('h2')->text());

		$this->assertEquals(1, $crawler->filter('#example-rule-category')->count());
		$this->assertEquals(1, $crawler->filter('#example-rule')->count());
	}

	/**
	* Test that the Rules header link nav does exist
	*
	* @access public
	*/
	public function test_boardrules_header_link_on()
	{
		$crawler = self::request('GET', 'index.php');

		$this->assertContains($this->lang('BOARDRULES'), $crawler->filter('.navbar')->text());
		$this->assertGreaterThan(0, $crawler->filter('.icon-boardrules')->count());
	}

	/**
	* Test that the Rules header link nav does not exist yet
	*
	* @access public
	*/
	public function test_boardrules_header_link_off()
	{
		$this->get_db();

		$sql = "UPDATE phpbb_config
			SET config_value = '0'
			WHERE config_name = 'boardrules_header_link'";

		$this->db->sql_query($sql);

		$this->purge_cache();

		$crawler = self::request('GET', 'index.php');

		$this->assertNotContains($this->lang('BOARDRULES'), $crawler->filter('.navbar')->text());
		$this->assertCount(0, $crawler->filter('.icon-boardrules'));
	}
}
