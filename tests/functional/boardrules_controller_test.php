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
		$crawler = self::request('GET', 'index.php/rules');
		$this->assertContainsLang('BOARDRULES_HEADER', $crawler->filter('h2')->text());

		self::assertEquals(1, $crawler->filter('#example-category')->count());
		self::assertEquals(1, $crawler->filter('#example-rule')->count());
		self::assertCount(1, $crawler->filter('ol.boardrules-rules.br-list-style-decimal'));
		self::assertCount(1, $crawler->filter('ol.boardrules-rules > li > ol.br-list-style-lower-alpha'));
	}

	public function test_alternative_list_styles()
	{
		$this->get_db();
		$styles = array(
			array('unordered', 'ul', 'disc', 'circle'),
			array('compound', 'ol', 'compound', 'compound'),
			array('none', 'ol', 'none', 'none'),
		);

		try
		{
			foreach ($styles as $style)
			{
				$sql = "UPDATE phpbb_config
					SET config_value = '" . $this->db->sql_escape($style[0]) . "'
					WHERE config_name = 'boardrules_list_style'";
				$this->db->sql_query($sql);
				$this->purge_cache();

				$crawler = self::request('GET', 'app.php/rules');
				self::assertCount(1, $crawler->filter("{$style[1]}.boardrules-rules.br-list-style-{$style[2]}"));
				self::assertCount(1, $crawler->filter("{$style[1]}.boardrules-rules > li > {$style[1]}.br-list-style-{$style[3]}"));
				if ($style[0] === 'compound')
				{
					self::assertSame(array('1.', '1.1.'), $crawler->filter('.boardrules-compound-prefix')->each(function ($node) {
						return $node->text();
					}));
				}
				else
				{
					self::assertCount(0, $crawler->filter('.boardrules-compound-prefix'));
				}
			}
		}
		finally
		{
			$sql = "UPDATE phpbb_config
				SET config_value = ''
				WHERE config_name = 'boardrules_list_style'";
			$this->db->sql_query($sql);
			$this->purge_cache();
		}
	}

	/**
	* Test that the Rules header link nav does exist
	*/
	public function test_boardrules_header_link_on()
	{
		$crawler = self::request('GET', 'index.php');

		$this->assertContainsLang('BOARDRULES', $crawler->filter('.navbar')->text());
//		self::assertGreaterThan(0, $crawler->filter('.fa-book')->count());
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

		$this->assertNotContainsLang('BOARDRULES', $crawler->filter('.navbar')->text());
//		self::assertCount(0, $crawler->filter('.fa-book'));
	}
}
