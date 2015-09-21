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
class boardrules_controller_test extends boardrules_functional_base
{
	/**
	* Test loading the rules page
	*/
	public function test_boardrules_page()
	{
		$crawler = self::request('GET', 'app.php/rules');
		$this->assertContains($this->lang('BOARDRULES_HEADER'), $crawler->filter('h2')->text());

		$this->assertEquals(1, $crawler->filter('#example-category')->count());
		$this->assertEquals(1, $crawler->filter('#example-rule')->count());
	}

	/**
	* Test that the Rules header link nav does exist
	*/
	public function test_boardrules_header_link_on()
	{
		$crawler = self::request('GET', 'index.php');

		$this->assertContains($this->lang('BOARDRULES'), $crawler->filter('.navbar')->text());
		$this->assertGreaterThan(0, $crawler->filter('.fa-book')->count());
	}

	/**
	* Test that the Rules header link nav does not exist yet
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
