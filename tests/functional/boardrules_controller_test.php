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
class boardrules_controller_test extends \extension_functional_test_case
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
	* Test loading the rules page
	*
	* @access public
	*/
	public function test_boardrules_page()
	{
		$this->logout();
		$crawler = self::request('GET', 'app.php/rules');
	}

	/**
	* Test loading the rules page with some sample data
	*
	* @access public
	*/
	public function test_boardrules_with_data()
	{
		$this->get_db();

		// Insert some sample rule data
		$insert_rules = array(
			array(
				'rule_id'							=> 1,
				'rule_language'						=> 1,
				'rule_left_id'						=> 1,
				'rule_right_id'						=> 4,
				'rule_parent_id'					=> 0,
				'rule_parents'						=> '',
				'rule_anchor'						=> 'section_1',
				'rule_title'						=> 'Rule Category',
				'rule_message'						=> '',
				'rule_message_bbcode_uid'			=> '',
				'rule_message_bbcode_bitfield'		=> '',
				'rule_message_bbcode_options'		=> 7,
			),
			array(
				'rule_id'							=> 2,
				'rule_language'						=> 1,
				'rule_left_id'						=> 2,
				'rule_right_id'						=> 3,
				'rule_parent_id'					=> 1,
				'rule_parents'						=> '',
				'rule_anchor'						=> 'rule_1',
				'rule_title'						=> 'Rule 1',
				'rule_message'						=> 'Rule Message',
				'rule_message_bbcode_uid'			=> '',
				'rule_message_bbcode_bitfield'		=> '',
				'rule_message_bbcode_options'		=> 7,
			),
		);

		$this->db->sql_multi_insert('phpbb_boardrules', $insert_rules);

		// test loading the rules page
		$crawler = self::request('GET', 'app.php/rules');
		$this->assertContains($this->lang('BOARDRULES_HEADER'), $crawler->text());

		// test that the data we inserted can be found on the rules page
		$this->assertContains($insert_rules[0]['rule_title'], $crawler->filter('#section_1')->text());
		$this->assertContains($insert_rules[1]['rule_message'], $crawler->filter('#rule_1')->text());
	}

	/**
	* Test for presence of the Rules header link nav
	*
	* @access public
	*/
	public function test_boardrules_header_link()
	{
		$this->logout();
		$crawler = self::request('GET', 'index.php');

		$this->assertContains($this->lang('BOARDRULES'), $crawler->filter('.navbar')->text());
		$this->assertGreaterThan(0, $crawler->filter('.icon-boardrules')->count());
	}
}
