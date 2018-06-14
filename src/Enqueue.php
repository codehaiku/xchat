<?php
add_action('wp_enqueue_scripts', 'xchat_enqueue_script');

function xchat_enqueue_script() {
	wp_enqueue_script( 'xchat', plugins_url('xchat/public/js/') . 'xchat.js', 
		array('jquery'), true, XCHAT_VERSION );

	wp_localize_script( 'buddykit-src', '__xchat', array(
			'rest_uri' => get_rest_url(null, 'xchat/v1/servlet'),
		));
}