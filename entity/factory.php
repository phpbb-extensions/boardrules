<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\entity;

/**
 * Factory for rule entities.
 */
class factory
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $boardrules_table;

	/**
	 * Constructor.
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, $boardrules_table)
	{
		$this->db = $db;
		$this->boardrules_table = $boardrules_table;
	}

	/**
	 * Create a fresh rule entity.
	 *
	 * @return rule_interface
	 */
	public function create()
	{
		return new rule($this->db, $this->boardrules_table);
	}
}
