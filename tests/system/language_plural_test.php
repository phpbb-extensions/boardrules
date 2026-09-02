<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\system;

class language_plural_test extends \phpbb_test_case
{
	public function test_all_language_packs_define_required_plural_forms()
	{
		$plural_keys = array(
			'ACP_BOARDRULES_COPY_APPEND_EXPLAIN',
			'ACP_BOARDRULES_RULE_COUNT',
			'ACP_BOARDRULES_COPY_SUCCESS',
			'ACP_BOARDRULES_COPY_ANCHORS_RENAMED',
		);
		$placeholders = array(
			'ACP_BOARDRULES_COPY_APPEND_EXPLAIN' => array('%d'),
			'ACP_BOARDRULES_RULE_COUNT' => array('%d'),
			'ACP_BOARDRULES_COPY_SUCCESS' => array('%1$d', '%2$s'),
			'ACP_BOARDRULES_COPY_ANCHORS_RENAMED' => array('%d'),
		);
		$expected_forms = array(
			'ar' => array(1, 2, 3, 4, 5, 6),
			'cs' => array(1, 2, 3),
			'hr' => array(1, 2, 3),
			'pl' => array(1, 2, 3),
			'ro' => array(1, 2, 3),
			'ru' => array(1, 2, 3),
			'sk' => array(1, 2, 3),
			'tr' => array(1),
			'uk' => array(1, 2, 3),
			'zh_cmn_hans' => array(1),
		);

		$language_root = dirname(__DIR__, 2) . '/language';
		foreach (glob($language_root . '/*/boardrules_acp.php') as $language_file)
		{
			$iso = basename(dirname($language_file));
			$lang = array();
			include $language_file;
			$forms = $expected_forms[$iso] ?? array(1, 2);

			foreach ($plural_keys as $key)
			{
				self::assertIsArray($lang[$key], $iso . ': ' . $key);
				self::assertSame($forms, array_keys($lang[$key]), $iso . ': ' . $key);

				foreach ($lang[$key] as $form => $translation)
				{
					preg_match_all('/%(?:\d+\$)?[ds]/', $translation, $matches);
					sort($matches[0]);
					$expected_placeholders = $placeholders[$key];
					sort($expected_placeholders);
					self::assertSame($expected_placeholders, $matches[0], $iso . ': ' . $key . '[' . $form . ']');
				}
			}
		}
	}
}
