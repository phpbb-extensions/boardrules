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
	/** @var string The database table the rules are stored in */
	protected $boardrules_table;

	/**
	* Set the board rules database table name
	*
	* @param string $boardrules_table
	* @return null
	*/
	public function set_table_name($boardrules_table)
	{
		$this->boardrules_table = $boardrules_table;
	}

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

	/**
	* {@inheritdoc}
	*/
	public function get_table_name()
	{
		return $this->boardrules_table;
	}
}
