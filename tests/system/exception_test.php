<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\system;

class exception_test extends \phpbb_test_case
{
	/** @var \phpbb\language\language */
	protected $lang;

	/**
	* Get an instance of \phpbb\language\language
	*/
	public static function get_language_instance()
	{
		global $phpbb_root_path, $phpEx;

		$lang_loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$lang_loader->set_extension_manager(new \phpbb_mock_extension_manager($phpbb_root_path));
		$lang = new \phpbb\language\language($lang_loader);
		$lang->add_lang('exceptions', 'phpbb/boardrules');

		return $lang;
	}

	protected function setUp(): void
	{
		parent::setUp();

		$this->lang = self::get_language_instance();
	}

	/**
	* Data for test_exceptions function
	*
	* @return array
	*/
	public static function exceptions_test_data()
	{
		$language = self::get_language_instance();

		return array(
			array(
				'base',
				'EXCEPTION_FIELD_MISSING',
				$language->lang('EXCEPTION_FIELD_MISSING'),
			),
			array(
				'base',
				array('EXCEPTION_OUT_OF_BOUNDS', '{foo}'),
				$language->lang('EXCEPTION_OUT_OF_BOUNDS', '{foo}'),
			),
			array(
				'invalid_argument',
				array('{foo}', 'FIELD_MISSING'),
				$language->lang('EXCEPTION_INVALID_ARGUMENT', '{foo}', $language->lang('EXCEPTION_FIELD_MISSING')),
			),
			array(
				'out_of_bounds',
				'{foo}',
				$language->lang('EXCEPTION_OUT_OF_BOUNDS', '{foo}'),
			),
			array(
				'unexpected_value',
				array('{foo}', 'TOO_LONG'),
				$language->lang('EXCEPTION_UNEXPECTED_VALUE', '{foo}', $language->lang('EXCEPTION_TOO_LONG')),
			),
		);
	}

	/**
	* Test some exceptions and make sure they're translated
	*
	* @dataProvider exceptions_test_data
	*/
	public function test_exceptions($exception_name, $message, $expected)
	{
		try
		{
			$exception_name = '\phpbb\boardrules\exception\\' . $exception_name;

			throw new $exception_name($message);
		}
		catch (\phpbb\boardrules\exception\base $e)
		{
			self::assertEquals($expected, $e->get_message($this->lang));
		}
	}

	/**
	* Test exception language file is being loaded
	*/
	public function test_exceptions_lang()
	{
		self::assertEquals('Required field missing', $this->lang->lang('EXCEPTION_FIELD_MISSING'));
	}
}
