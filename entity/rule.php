<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\entity;

/**
* Entity for a single rule
*/
class rule implements rule_interface
{
	/**
	* Data for this entity
	*
	* @var array
	*	rule_id
	*	rule_language
	*	rule_left_id
	*	rule_right_id
	*	rule_anchor
	*	rule_title
	*	rule_message
	*	rule_message_bbcode_uid
	*	rule_message_bbcode_bitfield
	*	rule_message_bbcode_options
	* @access protected
	*/
	protected $data;

	/**
	* Get id
	*
	* @return int Rule identifier
	* @access public
	*/
	public function get_id()
	{
		return (isset($this->data['rule_id'])) ? (int) $this->data['rule_id'] : 0;
	}

	/**
	* Get title
	*
	* @return string Title
	* @access public
	*/
	public function get_title()
	{
		return (isset($this->data['rule_title'])) ? (string) $this->data['rule_title'] : '';
	}

	/**
	* Set title
	*
	* @param string $title
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function set_title($title)
	{
		// Enforce a string
		$title = (string) $title;

		// We limit the title length to 200 characters
		if (truncate_string($title, 200) != $title)
		{
			throw new \phpbb\boardrules\exception\unexpected_value('TITLE_TOO_LONG');
		}

		// Set the title on our data array
		$this->data['rule_title'] = $title;

		// Return $this; so calls can be chained load()->set()->save()
		return $this;
	}

	/**
	* Get message for edit
	*
	* @return string
	* @access public
	*/
	public function get_message_for_edit()
	{
		// If these haven't been set yet; use defaults
		$text = (isset($this->data['rule_message'])) ? $this->data['rule_message'] : '';
		$uid = (isset($this->data['rule_message_bbcode_uid'])) ? $this->data['rule_message_bbcode_uid'] : '';
		$options = (isset($this->data['rule_message_bbcode_options'])) ? (int) $this->data['rule_message_bbcode_options'] : 0;

		// Generate for edit
		$message_data = generate_text_for_edit($text, $uid, $options);

		return $message_data['text'];
	}

	/**
	* Get message for display
	*
	* @param bool $censor_text True to censor the text (Defaut: true)
	* @return string
	* @access public
	*/
	public function get_message_for_display($censor_text = true)
	{
		// If these haven't been set yet; use defaults
		$text = (isset($this->data['rule_message'])) ? $this->data['rule_message'] : '';
		$uid = (isset($this->data['rule_message_bbcode_uid'])) ? $this->data['rule_message_bbcode_uid'] : '';
		$bitfield = (isset($this->data['rule_message_bbcode_bitfield'])) ? $this->data['rule_message_bbcode_bitfield'] : '';
		$options = (isset($this->data['rule_message_bbcode_options'])) ? (int) $this->data['rule_message_bbcode_options'] : 0;

		// Generate for display
		return generate_text_for_display($text, $uid, $bitfield, $options, $censor_text);
	}

	/**
	* Set message
	*
	* @param string $message
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function set_message($message)
	{
		// Prepare the text for storage
		$uid = $bitfield = $flags = '';
		generate_text_for_storage($message, $uid, $bitfield, $flags, $this->message_bbcode_enabled(), $this->message_magic_url_enabled(), $this->message_smilies_enabled());

		// Set the message to our data array
		$this->data['rule_message'] = $message;
		$this->data['rule_message_bbcode_uid'] = $uid;
		$this->data['rule_message_bbcode_bitfield'] = $bitfield;
		// Flags are already set

		// Return $this; so calls can be chained load()->set()->save()
		return $this;
	}

	/**
	* Check if bbcode is enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_bbcode_enabled()
	{
		return ($this->data['rule_message_bbcode_options'] & OPTION_FLAG_BBCODE);
	}

	/**
	* Enable bbcode on the message
	*
	* @return null
	* @access public
	*/
	public function message_enable_bbcode()
	{
		$this->data['rule_message_bbcode_options'] = $this->set_option($this->data['rule_message_bbcode_options'], OPTION_FLAG_BBCODE);
	}

	/**
	* Disable bbcode on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_bbcode()
	{
		$this->data['rule_message_bbcode_options'] = $this->set_option($this->data['rule_message_bbcode_options'], OPTION_FLAG_BBCODE, true);
	}

	/**
	* Check if magic_url is enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_magic_url_enabled()
	{
		return ($this->data['rule_message_bbcode_options'] & OPTION_FLAG_LINKS);
	}

	/**
	* Enable magic url on the message
	*
	* @return null
	* @access public
	*/
	public function message_enable_magic_url()
	{
		$this->data['rule_message_bbcode_options'] = $this->set_option($this->data['rule_message_bbcode_options'], OPTION_FLAG_LINKS);
	}

	/**
	* Disable magic url on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_magic_url()
	{
		$this->data['rule_message_bbcode_options'] = $this->set_option($this->data['rule_message_bbcode_options'], OPTION_FLAG_LINKS, true);
	}

	/**
	* Check if smilies are enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_smilies_enabled()
	{
		return ($this->data['rule_message_bbcode_options'] & OPTION_FLAG_SMILIES);
	}

	/**
	* Enable smilies on the message
	*
	* @return null
	* @access public
	*/
	public function message_enable_smilies()
	{
		$this->data['rule_message_bbcode_options'] = $this->set_option($this->data['rule_message_bbcode_options'], OPTION_FLAG_SMILIES);
	}

	/**
	* Disable smilies on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_smilies()
	{
		$this->data['rule_message_bbcode_options'] = $this->set_option($this->data['rule_message_bbcode_options'], OPTION_FLAG_SMILIES, true);
	}

	/**
	* Set option helper
	*
	* @param int $options Current options setting
	* @param int $option_value Value of the option
	* @param bool $negate Negate (unset) option (Default: False)
	* @return int new options with value set
	* @access protected
	*/
	protected function set_option($options, $option_value, $negate = false)
	{
		// If we're setting the option and the option is not already set
		if (!$negate && !($option_field & $option_value))
		{
			// Add the option to the options
			$options += $option_value;
		}

		// If we're unsetting the option and the option is already set
		if ($negate && $option_field & $option_value)
		{
			// Subtract the option from the options
			$options -= $option_value;
		}

		// Return the new options
		return $options;
	}
}
