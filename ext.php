<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules;

/**
* Extension class for custom enable/disable/purge actions
*/
class ext extends \phpbb\extension\base
{	
	/**
	* Single enable step that installs any included migrations
	* We must overwrite the default method to handle enabling our notifications
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return false Indicates no further steps are required
	*/
	function enable_step($old_state)
	{
		// Enable board rules notifications
		$phpbb_notifications = $this->container->get('notification_manager');
		$phpbb_notifications->enable_notifications('boardrules');

		// The following code comes from phpbb/extension/base.php enable_step() method
		$migrations = $this->get_migration_file_list();

		$this->migrator->set_migrations($migrations);

		$this->migrator->update();

		return !$this->migrator->finished();
	}

	/**
	* Single disable step that does nothing
	* We must overwrite the default method to handle disabling our notifications
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return false Indicates no further steps are required
	*/
	function disable_step($old_state)
	{
		// Disable board rules notifications
		$phpbb_notifications = $this->container->get('notification_manager');
		$phpbb_notifications->disable_notifications('boardrules');
		
		// The following code comes from phpbb/extension/base.php disable_step() method
		return false;
	}

	/**
	* Single purge step that reverts any included and installed migrations
	* We must overwrite the default method to handle purging our notifications
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return false Indicates no further steps are required
	*/
	function purge_step($old_state)
	{
		// Purge board rules notifications
		$phpbb_notifications = $this->container->get('notification_manager');
		$phpbb_notifications->purge_notifications('boardrules');

		// The following code comes from phpbb/extension/base.php purge_step() method
		$migrations = $this->get_migration_file_list();

		$this->migrator->set_migrations($migrations);

		foreach ($migrations as $migration)
		{
			while ($this->migrator->migration_state($migration) !== false)
			{
				$this->migrator->revert($migration);

				return true;
			}
		}

		return false;
	}
}
