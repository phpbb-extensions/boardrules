<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\controller;

/**
* Admin controller
*/
class admin_controller implements admin_interface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/**
	* Constructor
	*
	* @param \phpbb\config\config              $config           Config object
	* @param \phpbb\db\driver\driver           $db               Database object
	* @param \phpbb\request\request            $request          Request object
	* @param \phpbb\template\template          $template         Template object
	* @return \phpbb\boardrules\controller\admin_controller
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver $db, \phpbb\request\request $request, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
	}

	/**
	* Display the options a user can configure for this extension
	*
	* @return null
	* @access public
	*/
	public function display_options()
	{
		$this-template->assign_vars(array(
			'BOARDRULES_ENABLE'						=> $this->config['boardrules_enable'] ? true : false,
			'BOARDRULES_REQUIRE_AT_REGISTRATION'	=> $this->config['boardrules_require_at_registration'] ? true : false,
		));
	}

	/**
	* Set the options a user can configure
	*
	* @return null
	* @access public
	*/
	public function set_options()
	{
		$this->config->set('boardrules_enable', $this->request->variable('boardrules_enable', 0));
		$this->config->set('boardrules_require_at_registration', $this->request->variable('boardrules_require_at_registration', 0));
	}

	/**
	* Display the language selection
	*
	* Display the available languages to add/manage board rules from.
	* If there is only one board language, this will just call display_rules().
	*
	* @return null
	* @access public
	*/
	public function display_language_selection()
	{
		// Check if there are any available languages
		$sql = 'SELECT COUNT(lang_id) as languages_count
			FROM ' . LANG_TABLE;
		$result = $this->db->sql_query($sql);

		// If there are some, build option fields
		if ($this->db->sql_fetchfield('languages_count') > 1)
		{
			$this-template->assign_vars(array(
				'S_LANG_OPTIONS'	=> language_select($this->config['default_lang']),
			));
		}
		else
		{
			$this->display_rules();
		}
	}
}
