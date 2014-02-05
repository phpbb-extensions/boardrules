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
* Base exception
*/
class base extends \Exception
{
	protected $previous;

	/**
	 * Constructor
	 *
	 * Different from normal exceptions in that we do not enforce $message to be a string.
	 *
	 * @param string|array $message
	 * @param int $code
	 * @param Exception $previous
	 */
	public function __construct($message = null, $code = 0, Exception $previous = null)
	{
		$this->message = $message;
		$this->code = $code;
		$this->previous = $previous;
	}

	/**
	* Basic message translation for our exceptions
	*
	* @param \phpbb\user $user
	* @return string
	* @access public
	*/
	public function get_message(\phpbb\user $user)
	{
		// Make sure our language file has been loaded
		$this->add_lang($user);

		return $user->lang($this->getMessage());
	}

	/**
	* Translate all portions of the message sent to the exception
	*
	* Goes through each element of the array and tries to translate them
	*
	* @param \phpbb\user $user
	* @param array $message_portions The message portions to translate
	* @param string|null $parent_message Send a string to translate all of the
	*     portions with the parent message (typically used to format a string
	*     with the given message portions). Null to ignore. Default: Null
	* @return array|string Array if $parent_message === null else a string
	* @access protected
	*/
	protected function translate_portions(\phpbb\user $user, $message_portions, $parent_message = null)
	{
		// Make sure our language file has been loaded
		$this->add_lang($user);

		// Ensure we have an array
		if (!is_array($message_portions))
		{
			$message_portions = array($message_portions);
		}

		// Translate each message portion
		foreach ($message_portions as &$message)
		{
			// Attempt to translate each portion
			$translated_message = $user->lang('EXCEPTION_' . $message);

			// Check if translating did anything
			if ($translated_message !== 'EXCEPTION_' . $message)
			{
				// It did, so replace message with the translated version
				$message = $translated_message;
			}
		}

		if ($parent_message !== null)
		{
			// Prepend the parent message to the message portions
			array_unshift($message_portions, (string) $parent_message);

			// We return a string
			return call_user_func_array(array($user, 'lang'), $message_portions);
		}

		// We return an array
		return $message_portions;
	}

	/**
	* Add our language file
	*
	* @param \phpbb\user $user
	* @access public
	*/
	public function add_lang(\phpbb\user $user)
	{
		static $is_loaded = false;

		// We only need to load the language file once
		if ($is_loaded)
		{
			return;
		}

		// Add our language file
		$user->add_lang_ext('phpbb/boardrules', 'exceptions');

		// So the language file is only loaded once
		$is_loaded = true;
	}
}
