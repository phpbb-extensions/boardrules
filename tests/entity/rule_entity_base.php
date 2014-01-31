<?php
/**
*
* @package testing
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Base rule entity test (helper)
*/
class rule_entity_base extends \phpbb_database_test_case
{
	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/rule.xml');
	}

	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();
	}

	/**
	* Get the rule entity
	*
	* @return \phpbb\boardrules\entity\rule
	* @access protected
	*/
	protected function get_rule_entity()
	{
		return new \phpbb\boardrules\entity\rule();
	}

	/**
	* Some common data to test from which can be imported
	*
	* @return array Data to send to import_data
	* @access protected
	*/
	protected function get_import_data()
	{
		return array(
			1 => array(
				'rule_id'							=> '1',
				'rule_language'						=> '1',
				'rule_left_id'						=> '0',
				'rule_right_id'						=> '1',
				'rule_anchor'						=> '1 Anchor',
				'rule_title'						=> '1 Title',
				'rule_message'						=> '1 Message',
				'rule_message_bbcode_uid'			=> '1rgq4t6b',
				'rule_message_bbcode_bitfield'		=> '',
				'rule_message_bbcode_options'		=> '0',
			),
			2 => array(
				'rule_id'							=> '2',
				'rule_language'						=> '1',
				'rule_left_id'						=> '2',
				'rule_right_id'						=> '5',
				'rule_anchor'						=> '2 Anchor',
				'rule_title'						=> '2 Title',
				'rule_message'						=> '[b:155nknse]This is a test[/b:155nknse] <!-- s:) --><img src="{SMILIES_PATH}/icon_e_smile.gif" alt=":)" title="Smile" /><!-- s:) -->',
				'rule_message_bbcode_uid'			=> '155nknse',
				'rule_message_bbcode_bitfield'		=> 'QA==',
				'rule_message_bbcode_options'		=> '7',
			),
			3 => array(
				'rule_id'							=> '3',
				'rule_language'						=> '1',
				'rule_left_id'						=> '3',
				'rule_right_id'						=> '4',
				'rule_anchor'						=> '3 Anchor',
				'rule_title'						=> '3 Title',
				'rule_message'						=> '[quote=EXreaction]Another [i:2ebzz8aw]test[/i:2ebzz8aw]!<!-- m --><a class="postlink" href="http://google.com">http://google.com</a><!-- m -->[/quote]',
				'rule_message_bbcode_uid'			=> '2ebzz8aw',
				'rule_message_bbcode_bitfield'		=> 'IA==',
				'rule_message_bbcode_options'		=> '7',
			),
			4 => array(
				'rule_id'							=> '4',
				'rule_language'						=> '1',
				'rule_left_id'						=> '6',
				'rule_right_id'						=> '7',
				'rule_anchor'						=> '4 Anchor',
				'rule_title'						=> '4 Title',
				'rule_message'						=> '[b]Just[/b] one more :) http://google.com',
				'rule_message_bbcode_uid'			=> '',
				'rule_message_bbcode_bitfield'		=> '',
				'rule_message_bbcode_options'		=> '0',
			),
		);
	}
}
