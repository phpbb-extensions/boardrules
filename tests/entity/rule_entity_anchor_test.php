<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Tests related to anchors on rule entity
*/
class rule_entity_anchor_test extends rule_entity_base
{
	/**
	* Test data for the test_anchor() function
	*
	* @return array Array of test data
	*/
	public static function anchor_test_data()
	{
		return array(
			// sent to set_anchor(), expected from get_anchor()
			array('foo', 'foo'),
			array('foø-bar', 'foø-bar'),
			array('foó-bar', 'foó-bar'),
			array('', ''),
			array(null, ''),

			// Maximum length
			array(
				str_repeat('a', 255),
				str_repeat('a', 255),
			),
		);
	}

	/**
	* Test setting anchor
	*
	* @dataProvider anchor_test_data
	*/
	public function test_anchor($anchor, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the anchor
		$result = $entity->set_anchor($anchor);

		// Assert the returned value is what we expect
		self::assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// Assert that the anchor matches what's expected
		self::assertSame($expected, $entity->get_anchor());
	}

	/**
	* Test data for the test_anchor_fails() function
	*
	* @return array Array of test data
	*/
	public static function anchor_fails_test_data()
	{
		return array(
			// Starts with illegal characters
			array('#foo'),
			array(' foo'),

			// Contains illegal characters
			array('foo bar'),
			array('foo?bar'),
			array('foo#bar'),
			array('foo&bar'),
			array('foo$bar'),
			array('foo/bar'),
			array('foo@bar'),
			array('foo=bar'),
			array('foo+bar'),
			array('foo^bar'),
			array('foo*bar'),
			array('foo\'bar'),
			array('foo\\bar'),

			// Only illegal chars
			array('%'),
			array('('),
			array(')'),
			array('['),
			array(']'),
			array('{'),
			array('}'),
			array('!'),
			array('<'),
			array('>'),
			array(','),
			array(';'),
			array('"'),
			array('`'),
			array('~'),
			array('|'),
			array(':'),

			// Exceeds character maximum length
			array(
				str_repeat('a', 256),
			),

			// Anchor is not unique
			array('anchor_1'),
		);
	}

	/**
	* Test setting invalid data on the anchor which should throw an exception
	*
	* @dataProvider anchor_fails_test_data
	*/
	public function test_anchor_fails($anchor)
	{
		$this->expectException(\phpbb\boardrules\exception\base::class);

		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the anchor
		$entity->set_anchor($anchor);
	}

	/**
	* Test data for the test_unique_anchor() function
	*
	* @return array Array of test data
	*/
	public static function unique_anchor_test_data()
	{
		return array(
			// id // language // sent to set_anchor(), expected from get_anchor()
			array(null, 'en', '', ''), // new rule, anchor field empty, expect empty anchor to pass
			array(null, 'en', 'foo', 'foo'), // new rule, anchor is unique, expect unique anchor to pass
			array(4, 'en', '', ''), // existing rule, anchor is empty, expect empty anchor to pass
			array(4, 'en', 'foo', 'foo'), // existing rule, anchor is unique, expect unique anchor to pass
			array(1, 'en', 'anchor_1', 'anchor_1'), // existing rule, existing anchor is unique, expect existing anchor to pass
			array(null, 'en-us', 'anchor_1', 'anchor_1'), // new rule, new language, anchor is unique to the new language, expect anchor to pass
			array(null, '', '', ''), // new rule, no lang, anchor field empty, expect empty anchor to pass
			array(null, '', 'foo', 'foo'), // new rule, no lang, anchor is unique, expect unique anchor to pass
			array(1, '', 'anchor_1', 'anchor_1'), // existing rule, no lang, existing anchor is unique, expect existing anchor to pass
		);
	}

	/**
	* Test setting unique anchor
	*
	* @dataProvider unique_anchor_test_data
	*/
	public function test_unique_anchor($id, $language, $anchor, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Load the rule from the db if it exists
		if (null !== $id)
		{
			$entity->load($id);
		}

		// Set the anchor for the given language
		$result = $entity
			->set_language($language)
			->set_anchor($anchor);

		// Assert the returned value is what we expect
		self::assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// Assert that the anchor matches what's expected
		self::assertSame($expected, $entity->get_anchor());
	}

	/**
	* Test data for the test_unique_anchor_fails() function
	*
	* @return array Array of test data
	*/
	public static function unique_anchor_test_fails_data()
	{
		return array(
			// id // language // sent to set_anchor()
			array(null, 'en', 'anchor_1'), // new rule, new anchor is not unique (exists already in db)
			array(1, 'en', 'anchor_2'), // existing rule, new anchor is not unique (exists already in db)
			array(null, '', 'anchor_1'), // new rule, no lang, new anchor is not unique (exists already in db)
			array(1, '', 'anchor_2'), // existing rule, no lang, new anchor is not unique (exists already in db)
		);
	}

	/**
	* Test setting non-unique data on the anchor which should throw an exception
	*
	* @dataProvider unique_anchor_test_fails_data
	*/
	public function test_unique_anchor_fails($id, $language, $anchor)
	{
		$this->expectException(\phpbb\boardrules\exception\base::class);

		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Load the rule from the db if it exists
		if (null !== $id)
		{
			$entity->load($id);
		}

		// Set the anchor for the given language
		$entity
			->set_language($language)
			->set_anchor($anchor);
	}
}
