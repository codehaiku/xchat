<?php
/**
 * This file is part of the xchat WordPress Plugin package.
 *
 * (c) Dunhakdis SC. <joseph@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package xchat/src/install
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

global $xchat_db_version;
global $wpdb;

register_activation_hook( __FILE__, 'xchat_install' );
register_activation_hook( __FILE__, 'xchat_install_data' );
add_action( 'plugins_loaded', 'xchat_update_db_check' );

/**
 * Checks for database table updates.
 * @return void
 */
function xchat_update_db_check() {
	global $xchat_db_version;
	if ( get_site_option( 'xchat_db_version' ) !== $xchat_db_version ) {
		xchat_install();
	}
	return;
}

$xchat_db_version = '0.0.3';

/**
 * Actually installs the tables needed.
 * @return void
 */
function xchat_install() {

	global $wpdb;

	global $xchat_db_version;

	$installed_ver = get_option( 'xchat_db_version' );

	if ( $installed_ver !== $xchat_db_version ) {

		$table_name = $wpdb->prefix . 'xchat_messages';

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id 	mediumint(9) NOT NULL AUTO_INCREMENT,
			sender_id mediumint(9),
			body text,
			channel_id mediumint(9),
			receiver_id mediumint(9) NOT NULL,
			date_created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		dbDelta( $sql );

		add_option( 'xchat_db_version', $xchat_db_version );
	}
	return;
}
