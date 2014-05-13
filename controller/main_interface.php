<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\controller;

/**
* Interface for our main controller
*
* This describes all of the methods we'll use for the front-end of this extension
*/
interface main_interface
{
	/**
	* Display the rules page
	*
	* @return Symfony\Component\HttpFoundation\Response A Symfony Response object
	* @access public
	*/
	public function display();
}
