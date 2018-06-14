<?php
/**
 * Plugin Name: XChat - Modern Community Chat for WordPress
 * Plugin URI: https://dunhakdis.com
 * Description: Realtime chat for online communities. 
 * Version: 1.0.0
 * Author: Dunhakdis
 * Author URI: http://themeforest.net/user/dunhakdis
 * License: GPL2
 */

/**
 * Requires WordPress 4.5 and above
 */

add_action('init', 'xchat_loader');
define( 'XCHAT_VERSION', 1.0 );
define( 'XCHAT_DIR', __DIR__);
require_once XCHAT_DIR . '/src/Install.php';

function xchat_loader() {
	require_once XCHAT_DIR . '/src/Enqueue.php';
	require_once XCHAT_DIR . '/src/API.php';
}
