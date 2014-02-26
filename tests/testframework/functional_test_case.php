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
	* Set an extension vandor/name data up
	*
	* @param string $extension_vendor The vendor name of an extension
	* @param string $extension_name The package name of an extension
	* @param string $extension_display_name The display name of an extension
	* @return null
	* @access public
	*/
	public function set_extension($extension_vendor, $extension_name, $extension_display_name)
	{
		$this->extension_vendor = $extension_vendor;
		$this->extension_name = $extension_name;
		$this->extension_display_name = $extension_display_name;
	}

	/**
	* Enable an extension in the ACP Extensions area
	*
	* @return null
	* @access public
	*/
	public function enable_extension()
	{
		$enable_extension = false;

		if ($this->extension_enabled === true || $this->check_if_enabled())
		{
			return;
		}

		// Is the extension in the list of disabled extensions?
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
		}
	}

	/**
	* Disable an extension in the ACP Extensions area
	*
	* @return null
	* @access public
	*/
	public function disable_extension()
	{
		$disable_extension = $this->check_if_enabled();

		if ($this->extension_enabled === false || !$disable_extension)
		{
			return;
		}

		if ($disable_extension)
		{
			$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&action=disable_pre&ext_name=' . $this->extension_vendor . '%2f' . $this->extension_name . '&sid=' . $this->sid);
			$form = $crawler->selectButton('Disable')->form();
			$crawler = self::submit($form);
			$this->assertContains('The extension was disabled successfully', $crawler->text());
			$this->extension_enabled = false;
		}
	}

	/**
	* Purge an extension's data in the ACP Extensions area
	*
	* @return null
	* @access public
	*/
	public function purge_extension()
	{
		$purge_extension = false;

		if ($this->extension_enabled === true || $this->check_if_enabled())
		{
			return;
		}

		// Is the extension in the list of disabled extensions?
		$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&sid=' . $this->sid);
		$disabled_extensions = $crawler->filter('tr.ext_disabled')->extract(array('_text'));
		foreach ($disabled_extensions as $extension)
		{
			if (strpos($extension, $this->extension_display_name) !== false)
			{
				$purge_extension = true;
			}
		}

		if ($purge_extension)
		{
			$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&action=delete_data_pre&ext_name=' . $this->extension_vendor . '%2f' . $this->extension_name . '&sid=' . $this->sid);
			$form = $crawler->selectButton('Delete data')->form();
			$crawler = self::submit($form);
			$this->assertContains('The extension’s data was deleted successfully', $crawler->text());
			$this->extension_enabled = false;
		}
	}

	/**
	* Check if the extension is enabled in the database
	*
	* @return bool is extension found in the Enabled list
	* @access protected
	*/
	protected function check_if_enabled()
	{
		$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&sid=' . $this->sid);
		$enabled_extensions = $crawler->filter('tr.ext_enabled')->extract(array('_text'));
		foreach ($disabled_extensions as $extension)
		{
			if (strpos($extension, $this->extension_display_name) !== false)
			{
				return true;
			}
		}

		return false;
	}
}
