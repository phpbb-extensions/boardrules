<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\textreparser\plugins;

class rule_text extends \phpbb\textreparser\row_based_plugin
{
	/**
	* {@inheritdoc}
	*/
	public function get_columns()
	{
		return array(
			'id'			=> 'rule_id',
			'text'			=> 'rule_message',
			'bbcode_uid'	=> 'rule_message_bbcode_uid',
			'options'		=> 'rule_message_bbcode_options',
		);
	}
}
