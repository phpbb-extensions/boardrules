<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\migrations\v30x;

class m19_list_style_options extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->config['boardrules_list_style'] !== 'disc';
	}

	public static function depends_on()
	{
		return array(
			'\phpbb\boardrules\migrations\v20x\m17_list_style',
			'\phpbb\boardrules\migrations\v30x\m18_ruleset_status',
		);
	}

	public function update_data()
	{
		return array(
			array('config.update', array('boardrules_list_style', 'unordered')),
		);
	}

	public function revert_data()
	{
		return array(
			array('config.update', array('boardrules_list_style', 'disc')),
		);
	}
}
