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
class version_check_test extends \extension_functional_test_case
{
	public function setUp()
	{
		parent::setUp();
		$this->login();
		$this->admin_login();
		$this->set_extension('phpbb', 'boardrules', 'Board Rules');
		$this->enable_extension();
		$this->add_lang_ext(array('info_acp_boardrules'));
	}

	/**
	* Test extension manager version check
	*
	* @access public
	*/
	public function test_version_check()
	{
		// Load the Extension Manager module and re-check all versions
		$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&action=list&versioncheck_force=1&sid=' . $this->sid);

		// Assert that the name of our extension is in the extension manager list
		$this->assertContains(strtolower($this->lang('ACP_BOARDRULES')), strtolower($crawler->filter('tr.ext_enabled td')->eq(0)->text()));

		// Assert that the version check feature is working
		// The extension name is always strong, but the extension version will also be strong 
		// if the version check feature is working, so we test for more than one strong tag.
		$this->assertGreaterThan(1, $crawler->filter('tr.ext_enabled td strong')->count());
	}
}
