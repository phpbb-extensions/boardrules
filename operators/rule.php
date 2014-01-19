<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\operators;

/**
* Operator for a a set of rules
*/
class rule implements rule_interface
{
	/** @var \phpbb\db\driver\driver */
	protected $db;

	/**
	* The database table the rules are stored in
	*
	* @var string
	*/
	protected $boardrules_table;

	/**
	* Constructor
	*
	* @param \phpbb\db\driver\driver    $db                 Database object
	* @param string                     $boardrules_table   Name of the table used to store board rules data
	* @return null
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver $db, $boardrules_table)
	{
		$this->db = $db;
		$this->boardrules_table = $boardrules_table;
	}

	/**
	* Get the rules
	*
	* @param int $language Language selection identifier; default: 0
	* @param int $parent_id Category to display rules from; default: 0
	* @return array Array of rule_interface
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function get_rules($language = 0, $parent_id = 0)
	{
		global $phpbb_container;
		
		$data = array();
		
		$sql = 'SELECT *
			FROM ' . $this->boardrules_table . '
			WHERE rule_language = ' . (int) $language . ' AND rule_parent_id = ' . (int) $parent_id . '
			ORDER BY rule_left_id';
		$result = $this->db->sql_query($sql);
		
		while ($row = $this->db->sql_fetchrow($result))
		{
			$data[] = $phpbb_container->get('phpbb.boardrules.entity')->import($row);
		}
		$this->db->sql_freeresult($result);

		if (empty($data)
		{
			// Rules for the language do not exist
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_language');
		}

		return $data;
	}
}
