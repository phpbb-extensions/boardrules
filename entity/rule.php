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

	/** @var \phpbb\db\driver\driver */
	protected $db;

	/**
	* The database table the rules are stored in
	*
	* @var string
	*/
	protected $boardrules_table;

	/**
	* Constructor
	*
	* @param \phpbb\db\driver\driver    $db                 Database object
	* @param string                     $boardrules_table   Name of the table used to store board rules data
	* @return null
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver $db, $boardrules_table)
	{
		$this->db = $db;
		$this->boardrules_table = $boardrules_table;
	}

	/**
	* Load the data from the database for this rule
	*
	* @param int $id Rule identifier
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function load($id)
	{
		$sql = 'SELECT *
			FROM ' . $this->boardrules_table . '
			WHERE rule_id = ' . (int) $id;
		$result = $this->db->sql_query($sql);
		$this->data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if ($this->data === false)
		{
			// A rule does not exist
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_id');
		}

		return $this;
	}

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
	* Import data for this rule
	*
	* Used when the data is already loaded externally.
	* Any existing data on this rule is over-written.
	* All data is validated and an exception is thrown if any data is invalid.
	*
	* @param array $data Data array, typically from the database
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function import($data)
	{
		// Clear out any saved data
		$this->data = array();

		// All of our fields
		$fields = array(
			// column							=> data type (see settype())
			'rule_id'							=> 'integer',
			'rule_language'						=> 'integer',
			'rule_left_id'						=> 'integer',
			'rule_right_id'						=> 'integer',
			'rule_anchor'						=> 'set_anchor', // call set_anchor()
			'rule_title'						=> 'set_title', // call set_title()

			// We do not pass to set_message() as generate_text_for_storage would run twice
			'rule_message'						=> 'string',
			'rule_message_bbcode_uid'			=> 'string',
			'rule_message_bbcode_bitfield'		=> 'string',
			'rule_message_bbcode_options'		=> 'integer',
		);

		// Go through the basic fields and set them to our data array
		foreach ($fields as $field => $type)
		{
			// If the data wasn't sent to us, throw an exception
			if (!isset($data[$field]))
			{
				throw new \phpbb\boardrules\exception\invalid_argument(array($field, 'FIELD_MISSING'));
			}

			// If the type is a method on this class, call it
			if (method_exists($this, $type))
			{
				$this->$type($data[$field]);
			}
			else
			{
				// We're using settype to enforce data types
				settype($data[$field], $type);

				$this->data[$field] = $data[$field];
			}
		}

		// Some fields must be unsigned (>= 0)
		$validate_unsigned = array(
			'rule_id',
			'rule_language',
			'rule_left_id',
			'rule_right_id',
			'rule_message_bbcode_options',
		);

		foreach ($validate_unsigned as $field)
		{
			// If the data is less than 0, it's not unsigned and we'll throw an exception
			if ($this->data[$field] < 0)
			{
				throw new \phpbb\boardrules\exception\out_of_bounds($field);
			}
		}

		// Return $this; so calls can be chained load()->set()->save()
		return $this;
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
			throw new \phpbb\boardrules\exception\unexpected_value(array('title', 'TOO_LONG'));
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
		// Use defaults if these haven't been set yet
		$message = (isset($this->data['rule_message'])) ? $this->data['rule_message'] : '';
		$uid = (isset($this->data['rule_message_bbcode_uid'])) ? $this->data['rule_message_bbcode_uid'] : '';
		$options = (isset($this->data['rule_message_bbcode_options'])) ? (int) $this->data['rule_message_bbcode_options'] : 0;

		// Generate for edit
		$message_data = generate_text_for_edit($message, $uid, $options);

		return $message_data['text'];
	}

	/**
	* Get message for display
	*
	* @param bool $censor_text True to censor the text (Default: true)
	* @return string
	* @access public
	*/
	public function get_message_for_display($censor_text = true)
	{
		// If these haven't been set yet; use defaults
		$message = (isset($this->data['rule_message'])) ? $this->data['rule_message'] : '';
		$uid = (isset($this->data['rule_message_bbcode_uid'])) ? $this->data['rule_message_bbcode_uid'] : '';
		$bitfield = (isset($this->data['rule_message_bbcode_bitfield'])) ? $this->data['rule_message_bbcode_bitfield'] : '';
		$options = (isset($this->data['rule_message_bbcode_options'])) ? (int) $this->data['rule_message_bbcode_options'] : 0;

		// Generate for display
		return generate_text_for_display($message, $uid, $bitfield, $options, $censor_text);
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
		$this->set_message_option(OPTION_FLAG_BBCODE);
	}

	/**
	* Disable bbcode on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_bbcode()
	{
		$this->set_message_option(OPTION_FLAG_BBCODE, true);
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
		$this->set_message_option(OPTION_FLAG_LINKS);
	}

	/**
	* Disable magic url on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_magic_url()
	{
		$this->set_message_option(OPTION_FLAG_LINKS, true);
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
		$this->set_message_option(OPTION_FLAG_SMILIES);
	}

	/**
	* Disable smilies on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_smilies()
	{
		$this->set_message_option(OPTION_FLAG_SMILIES, true);
	}

	/**
	* Get anchor
	*
	* @return string anchor
	* @access public
	*/
	public function get_anchor()
	{
		return (isset($this->data['rule_anchor'])) ? (string) $this->data['rule_anchor'] : '';
	}

	/**
	* Set anchor
	*
	* @param string $anchor Anchor text
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function set_anchor($anchor)
	{
		// Enforce a string
		$anchor = (string) $anchor;

		// Anchor should start with a letter to be a valid HTML id attribute
		if (!preg_match('/^[a-z]/i', $anchor) && $anchor != '')
		{
			throw new \phpbb\boardrules\exception\unexpected_value(array('anchor', 'INVALID_CHARACTERS'));
		}

		// We limit the anchor length to 255 characters
		if (truncate_string($anchor, 255) != $anchor)
		{
			throw new \phpbb\boardrules\exception\unexpected_value(array('anchor', 'TOO_LONG'));
		}

		// Set the anchor on our data array
		$this->data['rule_anchor'] = $anchor;

		// Return $this; so calls can be chained load()->set()->save()
		return $this;
	}

	/**
	* Get the language identifier
	*
	* @return int language identifier
	* @access public
	*/
	public function get_language()
	{
		return (isset($this->data['rule_language'])) ? (int) $this->data['rule_language'] : 0;
	}

	/**
	* Get the left identifier (for the tree)
	*
	* @return int left identifier
	* @access public
	*/
	public function get_left_id()
	{
		return (isset($this->data['rule_left_id'])) ? (int) $this->data['rule_left_id'] : 0;
	}

	/**
	* Get the right identifier (for the tree)
	*
	* @return int right identifier
	* @access public
	*/
	public function get_right_id()
	{
		return (isset($this->data['rule_right_id'])) ? (int) $this->data['rule_right_id'] : 0;
	}

	/**
	* Set option helper
	*
	* @param int $option_value Value of the option
	* @param bool $negate Negate (unset) option (Default: False)
	* @param bool $reparse_message Reparse the message after setting option (Default: True)
	* @return null
	* @access protected
	*/
	protected function set_message_option($option_value, $negate = false, $reparse_message = true)
	{
		// If we're setting the option and the option is not already set
		if (!$negate && !($this->data['rule_message_bbcode_options'] & $option_value))
		{
			// Add the option to the options
			$this->data['rule_message_bbcode_options'] += $option_value;
		}

		// If we're unsetting the option and the option is already set
		if ($negate && $this->data['rule_message_bbcode_options'] & $option_value)
		{
			// Subtract the option from the options
			$this->data['rule_message_bbcode_options'] -= $option_value;
		}

		// Reparse the message
		if ($reparse_message && !empty($this->data['rule_message']))
		{
			$this->set_message($this->data['rule_message']);
		}
	}
}
