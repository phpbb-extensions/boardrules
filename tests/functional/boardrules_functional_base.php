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
class boardrules_functional_base extends \phpbb_functional_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	*/
	protected static function setup_extensions()
	{
		return array('phpbb/boardrules');
	}

	protected function setUp(): void
	{
		parent::setUp();
		$this->enable_boardrules();
		$this->add_lang_ext('phpbb/boardrules', array(
			'boardrules_common',
			'boardrules_controller',
			'info_acp_boardrules',
			'boardrules_acp',
		));
	}

	/**
	 * Board rules installs in a disabled state. We need to turn it on to test it.
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
}
