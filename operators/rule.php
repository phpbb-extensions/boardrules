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
	/**
	* Data for this operator
	*
	* @var array
	*        rule_id
	*        rule_language
	*        rule_left_id
	*        rule_right_id
	*        rule_anchor
	*        rule_title
	*        rule_message
	*        rule_message_bbcode_uid
	*        rule_message_bbcode_bitfield
	*        rule_message_bbcode_options
	* @access protected
	*/
	protected $data;

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
		$sql = 'SELECT *
			FROM ' . $this->boardrules_table . '
			WHERE rule_language = ' . (int) $language . '
			ORDER BY left_id';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$this->data[] = $row;
		}
		$this->db->sql_freeresult($result);

		if ($this->data === false)
		{
			// A language does not exist
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_language');
		}

		return $this;
	}
}
