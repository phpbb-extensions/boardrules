<?php
/**
*
* @package testing
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* Note: Copied and inspired by test code written by nickvergessen and marc1706
* This functional test case handles installation and enabling of an extension
*/

namespace phpbb\boardrules\tests\testframework;

abstract class functional_test_case extends \phpbb_functional_test_case
{
	/**
	* The vendor name of an extension
	* @var string
	*/
	protected $extension_vendor;

	/**
	* The package name of an extension
	* @var string
	*/
	protected $extension_name;

	/**
	* The display name of an extension
	* @var string
	*/
	protected $extension_display_name;

	/**
	* The enabled state of an extension
	* @var string
	*/
	protected $extension_enabled = false;

	/**
	* Enable an extension in the ACP Extensions area
	*
	* @param string $extension_vendor The vendor name of an extension
	* @param string $extension_name The package name of an extension
	* @param string $extension_display_name The display name of an extension
	* @return null
	* @access public
	*/
	public function enable_extension($extension_vendor, $extension_name, $extension_display_name)
	{
		$this->extension_vendor = $extension_vendor;
		$this->extension_name = $extension_name;
		$this->extension_display_name = $extension_display_name;

		$enable_extension = false;

		if ($this->extension_enabled === true || $this->check_if_enabled())
		{
			return;
		}

		$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&sid=' . $this->sid);
		$disabled_extensions = $crawler->filter('tr.ext_disabled')->extract(array('_text'));
		foreach ($disabled_extensions as $extension)
		{
			if (strpos($extension, $this->extension_display_name) !== false)
			{
				$enable_extension = true;
			}
		}

		if ($enable_extension)
		{
			$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&action=enable_pre&ext_name=' . $this->extension_vendor . '%2f' . $this->extension_name . '&sid=' . $this->sid);
			$form = $crawler->selectButton('Enable')->form();
			$crawler = self::submit($form);
			$this->assertContains('The extension was enabled successfully', $crawler->text());
			$this->extension_enabled = true;
			$this->set_enabled();
		}
	}

	/**
	* Check if the extension is enabled in the database
	*
	* @return int $enabled config value for the enable state stored in the db
	* @access protected
	*/
	protected function check_if_enabled()
	{
		$this->db = $this->get_db();

		$sql = "SELECT config_value FROM phpbb_config WHERE config_name = '" . $this->db->sql_escape($this->extension_name) . "_ext_enabled'";
		$result = $this->db->sql_query($sql);
		$enabled = $this->db->sql_fetchfield('config_value');
		$this->db->sql_freeresult($result);

		return $enabled;
	}

	/**
	* Set the extension to enabled in the database
	*
	* @return null
	* @access protected
	*/
	protected function set_enabled()
	{
		$this->db = $this->get_db();

		$sql = "INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('" . $this->db->sql_escape($this->extension_name) . "_ext_enabled', 1, 1)";
		$this->db->sql_query($sql);
	}
}
