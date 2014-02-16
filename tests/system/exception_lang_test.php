<?php
/**
*
* @package testing
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

class extension_system_exception_lang_test extends phpbb_test_case
{
	/**
	* Test exception language file is being loaded
	*
	* @access public
	*/
	public function test_lang()
	{
		// Must do this for testing with the user class
		global $config, $phpbb_extension_manager, $phpbb_root_path;

		$config['default_lang'] = 'en';

		// Must mock extension manager for the user class
		$phpbb_extension_manager = new phpbb_mock_extension_manager($phpbb_root_path);

		// Get instance of phpbb\user
		$this->user = new \phpbb\user();

		$this->user->add_lang_ext('phpbb/boardrules', 'exceptions');

		// Test a language string present in the exceptions language file
		$this->assertEquals('Required field missing', $this->user->lang('EXCEPTION_FIELD_MISSING'));
	}
}
