<?php
add_action( 'rest_api_init', 'xchat_server_register' );

/**
 * 
 * @return void
 * @todo  add security
 */
function xchat_server_register() {
  	register_rest_route( 'xchat/v1', '/servlet', array(
    	'methods' => 'GET',
    	'callback' => 'xchat_server_push',
  	));
}

/**
 * Simple server function to serve our chat messages.
 * @return object WP_Rest_Response The response.
 */
function xchat_server_push() 
{
	
	header('Content-Type: text/event-stream');

	$data = array(
			'user_id' => 1,
			'body' => 'Hello!',
		);
	
	echo "data: " . json_encode( $data ) . "\n\n";;

	return 0;

}