# Script Modules in Footer #

Contributors: [westonruter](https://profile.wordpress.org/westonruter)  
Tested up to: 6.8  
Stable tag:   0.1.0  
License:      GPLv2 or later  
License URI:  https://www.gnu.org/licenses/gpl-2.0.html  
Tags:         performance

## Description ##

Prints script modules at `wp_footer` instead of at `wp_head` to improve performance by reducing network contention for the critical rendering path. This can be used with [Script Fetch Priority Low](https://github.com/westonruter/script-modules-in-footer) to improve performance even more. This is only relevant for block themes.

## Installation ##

1. Download the plugin [ZIP from GitHub](https://github.com/westonruter/script-modules-in-footer/archive/refs/heads/main.zip) or if you have a local clone of the repo, run `npm run plugin-zip`.
2. Visit **Plugins > Add New Plugin** in the WordPress Admin.
3. Click **Upload Plugin**.
4. Select the `script-modules-in-footer.zip` file on your system from step 1 and click **Install Now**.
5. Click the **Activate Plugin** button.

You may also install and update via [Git Updater](https://git-updater.com/).

## Changelog ##

### 0.1.0 ###

* Initial release.
