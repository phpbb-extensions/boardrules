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
	* Create a fresh admin session on the board rules page.
	*/
	protected function visit_rules_as_admin()
	{
		$db = $this->get_db();

		// XXX hardcoded user id
		$sql = 'DELETE FROM ' . SESSIONS_TABLE . ' WHERE session_user_id = 2';
		$db->sql_query($sql);

		$this->login();
		$crawler = self::request('GET', "index.php/rules?sid=$this->sid");
		$this->assertContainsLang('BOARDRULES_HEADER', $crawler->filter('h2')->text());
	}

	/**
	* Test viewonline page for admin
	*/
	public function test_viewonline_check_viewonline()
	{
		$this->visit_rules_as_admin();

		// Create a second user and check who is online from a separate session.
		self::$client->restart();
		$this->create_user('boardrules-viewonline-user1');
		$this->login('boardrules-viewonline-user1');
		// PHP goes faster than DBMS, make sure session data got written to the database.
		sleep(1);
		$crawler = self::request('GET', "viewonline.php?sid=$this->sid");

		// Is admin still viewing Rules page?
		self::assertStringContainsString('admin', $crawler->filter('#page-body table.table1')->text());

		$session_entries = $crawler->filter('#page-body table.table1 tr')->count();
		self::assertGreaterThanOrEqual(3, $session_entries, 'Too few session entries found');

		// Check each entry in the viewonline table
		// Skip the first row (header)
		for ($i = 1; $i < $session_entries; $i++)
		{
			// If we found the admin, we check his page info and leave
			$subcrawler = $crawler->filter('#page-body table.table1 tr')->eq($i);
			if (strpos($subcrawler->filter('td')->text(), 'admin') !== false)
			{
				$this->assertContainsLang('BOARDRULES_VIEWONLINE', $subcrawler->filter('td.info')->text());
				return;
			}
		}

		// If we did not find the admin, we fail
		self::fail('User "admin" was not found on viewonline page.');
	}
}
