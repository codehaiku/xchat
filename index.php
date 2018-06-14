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
function xchat_loader() {
	require_once __DIR__ . '/src/Enqueue.php';
	require_once __DIR__ . '/src/Message.php';
	require_once __DIR__ . '/src/API.php';
}
