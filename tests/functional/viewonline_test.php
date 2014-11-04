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
class viewonline_test extends boardrules_functional_base
{
	/**
	* Visit rules page as user "admin"
	*
	* @access public
	*/
	public function test_viewonline_visit_rules()
	{
		// Send the admin to the Rules page
		$this->login();
		$crawler = self::request('GET', "app.php/rules?sid={$this->sid}");
		$this->assertContains($this->lang('BOARDRULES_HEADER'), $crawler->filter('h2')->text());
	}

	/**
	* Test viewonline page for admin
	*
	* We use a second function here, so we get a new session and can login
	* without having to log out "admin" first.
	*
	* @access  public
	* @depends test_viewonline_visit_rules
	*/
	public function test_viewonline_check_viewonline()
	{
		// Create user1 and send them to the Viewonline
		$this->create_user('user1');
		$this->login('user1');
		$crawler = self::request('GET', "viewonline.php?sid={$this->sid}");

		// Is admin still viewing Rules page
		$this->assertContains('admin', $crawler->filter('#page-body table.table1')->text());

		$session_entries = $crawler->filter('#page-body table.table1 tr')->count();
		$this->assertGreaterThanOrEqual(3, $session_entries, 'Too few session entries found');

		// Check each entry in the viewonline table
		// Skip the first row (header)
		for ($i = 1; $i < $session_entries; $i++)
		{
			// If we found the admin, we check his page info and leave
			$subcrawler = $crawler->filter('#page-body table.table1 tr')->eq($i);
			if (strpos($subcrawler->filter('td')->text(), 'admin') !== false)
			{
				$this->assertContains($this->lang('BOARDRULES_VIEWONLINE'), $subcrawler->filter('td.info')->text());
				return;
			}
		}

		// If we did not find the admin, we fail
		$this->fail('User "admin" was not found on viewonline page.');
	}
}
