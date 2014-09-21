<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
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
	*	rule_parent_id
	*	rule_parents
	*	rule_anchor
	*	rule_title
	*	rule_message
	*	rule_message_bbcode_uid
	*	rule_message_bbcode_bitfield
	*	rule_message_bbcode_options
	* @access protected
	*/
	protected $data;

	/** @var \phpbb\db\driver\driver_interface */
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
	* @param \phpbb\db\driver\driver_interface    $db                 Database object
	* @param string                               $boardrules_table   Name of the table used to store board rules data
	* @return \phpbb\boardrules\entity\rule
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver_interface $db, $boardrules_table)
	{
		$this->db = $db;
		$this->boardrules_table = $boardrules_table;
	}

	/**
	* Load the data from the database for this rule
	*
	* @param int $id Rule identifier
	* @return rule_interface $this object for chaining calls; load()->set()->save()
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
	* Import data for this rule
	*
	* Used when the data is already loaded externally.
	* Any existing data on this rule is over-written.
	* All data is validated and an exception is thrown if any data is invalid.
	*
	* @param array $data Data array, typically from the database
	* @return rule_interface $this object for chaining calls; load()->set()->save()
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
			'rule_parent_id'					=> 'integer',
			'rule_parents'						=> 'string',
			'rule_anchor'						=> 'string',
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
				// settype passes values by reference
				$value = $data[$field];

				// We're using settype to enforce data types
				settype($value, $type);

				$this->data[$field] = $value;
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

		return $this;
	}

	/**
	* Insert the rule for the first time
	*
	* Will throw an exception if the rule was already inserted (call save() instead)
	*
	* @param int $language The language identifier
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function insert($language = 0)
	{
		if (!empty($this->data['rule_id']))
		{
			// The rule already exists
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_id');
		}

		// Resets values required for the nested set system
		$this->data['rule_parent_id'] = 0;
		$this->data['rule_left_id'] = 0;
		$this->data['rule_right_id'] = 0;
		$this->data['rule_parents'] = '';

		// Make extra sure there is no rule_id set
		unset($this->data['rule_id']);

		// Add the language identifier to the data array
		$this->data['rule_language'] = $language;

		// Insert the rule data to the database
		$sql = 'INSERT INTO ' . $this->boardrules_table . ' ' . $this->db->sql_build_array('INSERT', $this->data);
		$this->db->sql_query($sql);

		// Set the rule_id using the id created by the SQL insert
		$this->data['rule_id'] = (int) $this->db->sql_nextid();

		return $this;
	}

	/**
	* Save the current settings to the database
	*
	* This must be called before closing or any changes will not be saved!
	* If adding a rule (saving for the first time), you must call insert() or an exeception will be thrown
	*
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function save()
	{
		if (empty($this->data['rule_id']))
		{
			// The rule does not exist
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_id');
		}

		$sql = 'UPDATE ' . $this->boardrules_table . '
			SET ' . $this->db->sql_build_array('UPDATE', $this->data) . '
			WHERE rule_id = ' . $this->get_id();
		$this->db->sql_query($sql);

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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\unexpected_value
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_bbcode()
	{
		$this->set_message_option(OPTION_FLAG_BBCODE);

		return $this;
	}

	/**
	* Disable bbcode on the message
	*
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_bbcode()
	{
		$this->set_message_option(OPTION_FLAG_BBCODE, true);

		return $this;
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_magic_url()
	{
		$this->set_message_option(OPTION_FLAG_LINKS);

		return $this;
	}

	/**
	* Disable magic url on the message
	*
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_magic_url()
	{
		$this->set_message_option(OPTION_FLAG_LINKS, true);

		return $this;
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_smilies()
	{
		$this->set_message_option(OPTION_FLAG_SMILIES);

		return $this;
	}

	/**
	* Disable smilies on the message
	*
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_smilies()
	{
		$this->set_message_option(OPTION_FLAG_SMILIES, true);

		return $this;
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\unexpected_value
	*/
	public function set_anchor($anchor)
	{
		// Enforce a string
		$anchor = (string) $anchor;

		// Anchor should not contain any special characters
		if (($anchor != '') && !preg_match('/^[^!"#$%&*\'()+,.\/\\\\:;<=>?@\[\]^`{|}~ ]*$/i', $anchor))
		{
			throw new \phpbb\boardrules\exception\unexpected_value(array('anchor', 'ILLEGAL_CHARACTERS'));
		}

		// We limit the anchor length to 255 characters
		if (truncate_string($anchor, 255) != $anchor)
		{
			throw new \phpbb\boardrules\exception\unexpected_value(array('anchor', 'TOO_LONG'));
		}

		// Make sure rule anchors are unique
		// Test if new page and anchor field has data or...
		//    if existing page and anchor field has new data not equal to exisiting anchor data
		if ((!$this->get_id() && $anchor !== '') || ($this->get_id() && $anchor !== '' && $this->get_anchor() !== $anchor))
		{
			$sql = 'SELECT 1
				FROM ' . $this->boardrules_table . "
				WHERE rule_anchor = '" . $this->db->sql_escape($anchor) . "'
					AND rule_id <> " . $this->get_id();
			$result = $this->db->sql_query_limit($sql, 1);
			$row = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			if ($row)
			{
				throw new \phpbb\boardrules\exception\unexpected_value(array('anchor', 'NOT_UNIQUE'));
			}
		}

		// Set the anchor on our data array
		$this->data['rule_anchor'] = $anchor;

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
	* Get the parent identifier
	*
	* @return int parent identifier
	* @access public
	*/
	public function get_parent_id()
	{
		return (isset($this->data['rule_parent_id'])) ? (int) $this->data['rule_parent_id'] : 0;
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
		// Set rule_message_bbcode_options to 0 if it does not yet exist
		$this->data['rule_message_bbcode_options'] = (isset($this->data['rule_message_bbcode_options'])) ? $this->data['rule_message_bbcode_options'] : 0;

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
			$message = $this->data['rule_message'];

			decode_message($message, $this->data['rule_message_bbcode_uid']);

			$this->set_message($message);
		}
	}
}
