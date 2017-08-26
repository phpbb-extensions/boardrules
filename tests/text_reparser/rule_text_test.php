<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\text_reparser;

include_once __DIR__ . '/../../../../../../tests/text_reparser/plugins/test_row_based_plugin.php';

class rule_text_test extends \phpbb_textreparser_test_row_based_plugin
{
	static protected function setup_extensions()
	{
		return array('phpbb/boardrules');
	}

	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/fixtures/boardrules.xml');
	}

	protected function get_reparser()
	{
		return new \phpbb\boardrules\textreparser\plugins\rule_text($this->db, 'phpbb_boardrules');
	}
}
