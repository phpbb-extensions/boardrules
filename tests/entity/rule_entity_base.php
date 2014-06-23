<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\entity;

require_once dirname(__FILE__) . '/../../../../../includes/functions.php';
require_once dirname(__FILE__) . '/../../../../../includes/functions_content.php';
require_once dirname(__FILE__) . '/../../../../../includes/utf/utf_tools.php';

/**
* Base rule entity test (helper)
*/
class rule_entity_base extends \phpbb_database_test_case
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

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/rule.xml');
	}

	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();

		global $config, $phpbb_dispatcher;
		$config =  new \phpbb\config\config(array());
		set_config(null, null, null, $config);

		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();
	}

	/**
	* Get the rule entity
	*
	* @return \phpbb\boardrules\entity\rule
	* @access protected
	*/
	protected function get_rule_entity()
	{
		return new \phpbb\boardrules\entity\rule($this->db, 'phpbb_boardrules');
	}

	/**
	* Some common data to test from which can be imported
	*
	* @return array Data to send to import_data
	* @access public
	*/
	public function get_import_data()
	{
		return array(
			1 => array(
				'rule_id'							=> 1,
				'rule_language'						=> 1,
				'rule_left_id'						=> 0,
				'rule_right_id'						=> 1,
				'rule_parent_id'					=> 0,
				'rule_parents'						=> '',
				'rule_anchor'						=> 'anchor1',
				'rule_title'						=> '1 Title',
				'rule_message'						=> '1 Message',
				'rule_message_bbcode_uid'			=> '1rgq4t6b',
				'rule_message_bbcode_bitfield'		=> '',
				'rule_message_bbcode_options'		=> 0,
			),
			2 => array(
				'rule_id'							=> 2,
				'rule_language'						=> 1,
				'rule_left_id'						=> 2,
				'rule_right_id'						=> 5,
				'rule_parent_id'					=> 0,
				'rule_parents'						=> '',
				'rule_anchor'						=> 'anchor2',
				'rule_title'						=> '2 Title',
				'rule_message'						=> '[b:155nknse]This is a test[/b:155nknse] <!-- s:) --><img src="{SMILIES_PATH}/icon_e_smile.gif" alt=":)" title="Smile" /><!-- s:) -->',
				'rule_message_bbcode_uid'			=> '155nknse',
				'rule_message_bbcode_bitfield'		=> 'QA==',
				'rule_message_bbcode_options'		=> 7,
			),
			3 => array(
				'rule_id'							=> 3,
				'rule_language'						=> 1,
				'rule_left_id'						=> 3,
				'rule_right_id'						=> 4,
				'rule_parent_id'					=> 2,
				'rule_parents'						=> '',
				'rule_anchor'						=> 'anchor3',
				'rule_title'						=> '3 Title',
				'rule_message'						=> '[quote=EXreaction]Another [i:2ebzz8aw]test[/i:2ebzz8aw]!<!-- m --><a class="postlink" href="http://google.com">http://google.com</a><!-- m -->[/quote]',
				'rule_message_bbcode_uid'			=> '2ebzz8aw',
				'rule_message_bbcode_bitfield'		=> 'IA==',
				'rule_message_bbcode_options'		=> 7,
			),
			4 => array(
				'rule_id'							=> 4,
				'rule_language'						=> 1,
				'rule_left_id'						=> 6,
				'rule_right_id'						=> 7,
				'rule_parent_id'					=> 0,
				'rule_parents'						=> '',
				'rule_anchor'						=> 'anchor4',
				'rule_title'						=> '4 Title',
				'rule_message'						=> '[b]Just[/b] one more :) http://google.com',
				'rule_message_bbcode_uid'			=> '',
				'rule_message_bbcode_bitfield'		=> '',
				'rule_message_bbcode_options'		=> 0,
			),
		);
	}
}
