<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\exception;

/**
* UnexpectedValue exception
*/
class unexpected_value extends base
{
	/**
	* Translate this exception
	*
	* @param \phpbb\user $user
	* @return string
	* @access public
	*/
	public function get_message(\phpbb\user $user)
	{
		return $this->translate_portions($user, $this->message_full, 'EXCEPTION_UNEXPECTED_VALUE');
	}
}
