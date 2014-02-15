<?php
/**
*
* @package testing
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

class extension_system_exception_test extends phpbb_test_case
{
	/**
	* Get an instance of phpbb\user
	*
	* @access public
	*/
	public function get_user_instance()
	{
		// Must do this for testing with the user class
		global $config;
		$config['default_lang'] = 'en';

		// Get instance of phpbb\user (dataProvider is called before setUp(), so this must be done here)
		$this->user = new \phpbb\user();
	}

	public function setUp()
	{
		parent::setUp();

		// Must mock extension manager for the user class
		global $phpbb_extension_manager, $phpbb_root_path;
		$phpbb_extension_manager = new phpbb_mock_extension_manager($phpbb_root_path);

		$this->get_user_instance();
	}

	/**
	* Data for test_exceptions function
	*
	* @return array
	* @access public
	*/
	public function test_exceptions_data()
	{
		$this->get_user_instance();
		
		return array(
			array(
				'base',
				'EXCEPTION_FIELD_MISSING',
				$this->user->lang('EXCEPTION_FIELD_MISSING'),
			),
			array(
				'base',
				array('EXCEPTION_OUT_OF_BOUNDS', '{foo}'),
				$this->user->lang('EXCEPTION_OUT_OF_BOUNDS', '{foo}'),
			),
			array(
				'invalid_argument',
				array('{foo}', 'FIELD_MISSING'),
				$this->user->lang('EXCEPTION_INVALID_ARGUMENT', '{foo}', $this->user->lang('EXCEPTION_FIELD_MISSING')),
			),
			array(
				'out_of_bounds',
				'{foo}',
				$this->user->lang('EXCEPTION_OUT_OF_BOUNDS', '{foo}'),
			),
			array(
				'unexpected_value',
				array('{foo}', 'TOO_LONG'),
				$this->user->lang('EXCEPTION_UNEXPECTED_VALUE', '{foo}', $this->user->lang('EXCEPTION_TOO_LONG')),
			),
		);
	}

	/**
	* Test some exceptions and make sure they're translated
	*
	* @dataProvider test_exceptions_data
	* @access public
	*/
	public function test_exceptions($exception_name, $message, $expected)
	{
		try
		{
			$exception_name = '\phpbb\boardrules\exception\\' . $exception_name;

			throw new $exception_name($message);
		}
		catch (phpbb\boardrules\exception\base $e)
		{
			$this->assertEquals($expected, $e->get_message($this->user));
		}
	}
}
