<?php
/**
*
* @package testing
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Tests related to the message on rule entity
*/
class rule_entity_message_test extends rule_entity_base
{
	/**
	* Test data for the test_message() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function test_message_data()
	{
		return array(
			// sent to set_message()
			array('This is a test message.'),
			array('This is a test message. :)'),
			array('This is a test [b]message[/b].'),
			array('This is a test [b]message[/b]. :)'),
			array('This is a test message. http://test.com'),
			array('This is a test message. :) http://test.com'),
			array('This is a test [b]message[/b]. http://test.com'),
			array('This is a test [b]message[/b]. :) http://test.com'),
		);
	}

	/**
	* Test setting message
	*
	* This function automatically handles different options for parsing the
	* message and tests them all
	*
	* @dataProvider test_message_data
	* @access public
	*/
	public function test_message($message)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the message
		$result = $entity->set_message($message);

		// Assert the returned value is what we expect
		$this->assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// We start with all options set to false
		$enable_bbcode = $enable_magic_url = $enable_smilies = $censor_text = false;
		$i = 0;

		// We continue until all options are set to true (should be 2 ^ 4 (16) times)
		while (!$enable_bbcode || !$enable_magic_url || !$enable_smilies || !$censor_text)
		{
			// We're using bitwise operation to figure out what option is set at each iteration
			$enable_bbcode = ($i & 1) ? true : false;
			$enable_magic_url = ($i & 2) ? true : false;
			$enable_smilies = ($i & 4) ? true : false;
			$censor_text = ($i & 8) ? true : false;

			// Enable/disable bbcodes/smilies/magic url based on the options
			// The message is automatically reparsed once the option is set
			if ($enable_bbcode)
			{
				$entity->message_enable_bbcode();
			}
			else
			{
				$entity->message_disable_bbcode();
			}

			if ($enable_magic_url)
			{
				$entity->message_enable_magic_url();
			}
			else
			{
				$entity->message_disable_magic_url();
			}

			if ($enable_smilies)
			{
				$entity->message_enable_smilies();
			}
			else
			{
				$entity->message_disable_smilies();
			}


			// Get what we're expecting from
			$test = $this->message_test_helper($mesage, $enable_bbcode, $enable_magic_url, $enable_smilies, $censor_text);

			$this->assertSame($test['edit'], $entity->get_message_for_edit());

			$this->assertSame($test['display'], $entity->get_message_for_display($censor_text));

			// Increment the options
			$i++;
		}
	}

	/**
	* Helper for message test
	*
	* @param string $message The message
	* @param bool $enable_bbcode
	* @param bool $enable_magic_url
	* @param bool $enable_smilies
	* @param bool $censor_text
	* @return array
	* @access protected
	*/
	protected function message_test_helper($message, $enable_bbcode, $enable_magic_url, $enable_smilies, $censor_text)
	{
		$return = array();

		// Prepare the text for storage
		$uid = $bitfield = $flags = '';
		generate_text_for_storage($message, $uid, $bitfield, $flags, false, false, false);

		// Prepare for edit
		$return['edit'] = generate_text_for_edit($message, $uid, $flags);
		$return['edit'] = $return['edit']['text'];

		// Prepare for display
		$return['display'] = generate_text_for_display($message, $uid, $bitfield, $options, $censor_text);

		return $return;
	}
}
