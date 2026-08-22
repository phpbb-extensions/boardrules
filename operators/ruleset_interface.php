<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\operators;

interface ruleset_interface
{
	/**
	 * Get installed languages with their rule counts and publication state.
	 *
	 * @return array
	 */
	public function get_languages();

	/**
	 * Append a complete language ruleset to a target language.
	 *
	 * @param string $source_language
	 * @param string $target_language
	 * @return array Copy result containing rule and renamed-anchor counts
	 * @throws \Exception
	 */
	public function copy($source_language, $target_language);

	/**
	 * Test whether a language ruleset is published.
	 *
	 * Languages without an explicit state are published for backwards compatibility.
	 *
	 * @param string $language
	 * @return bool
	 */
	public function is_published($language);

	/**
	 * Get the custom introduction for a language ruleset.
	 *
	 * An empty value means the translated language string should be used.
	 *
	 * @param string $language
	 * @return string
	 */
	public function get_intro_text($language);

	/**
	 * Set the custom introduction for a language ruleset.
	 *
	 * @param string $language
	 * @param string $intro_text
	 * @return void
	 */
	public function set_intro_text($language, $intro_text);

	/**
	 * Set publication state for a populated language ruleset.
	 *
	 * @param string $language
	 * @param bool $published
	 * @return void
	 */
	public function set_published($language, $published);
}
