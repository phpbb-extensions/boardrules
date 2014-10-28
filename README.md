# phpBB Board Rules Extension

This is the repository for the development of the phpBB Board Rules Extension.

[![Build Status](https://travis-ci.org/phpbb-extensions/boardrules.png)](https://travis-ci.org/phpbb-extensions/boardrules)

## Quick Install
You can install this on the latest release of phpBB 3.1 by following the steps below:

1. [Download the latest release](https://github.com/phpbb-extensions/boardrules/releases).
2. Unzip the downloaded release, and change the name of the folder to `boardrules`.
3. In the `ext` directory of your phpBB board, create a new directory named `phpbb` (if it does not already exist).
4. Copy the `boardrules` directory to `phpBB/ext/phpbb/` (if done correctly, you'll have the main extension class at (your forum root)/ext/phpbb/boardrules/ext.php).
5. Navigate in the ACP to `Customise -> Manage extensions`.
6. Look for `Board Rules` under the Disabled Extensions list, and click its `Enable` link.
7. Set up and configure Board Rules by navigating in the ACP to `Extensions` -> `Board Rules`.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Board Rules` under the Enabled Extensions list, and click its `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/phpbb/boardrules` directory.

## Support

* **Important: Only official release versions validated by the phpBB Extensions Team should be installed on a live forum. Pre-release (beta, RC) versions downloaded from this repository are only to be used for testing on offline/development forums and are not officially supported.**
* Report bugs and other issues to our [Issue Tracker](https://github.com/phpbb-extensions/boardrules/issues).
* Support requests should be posted and discussed in the [Board Rules topic at phpBB.com](https://www.phpbb.com/customise/db/extension/boardrules/support).

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)
