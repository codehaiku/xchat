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

	// Should transfer this
	require_once XCHAT_DIR . '/src/Message.php';
	require_once XCHAT_DIR . '/src/MessageCrud.php';
	
	$message = new XChat\Message\Message();
	$message->set_receiver_id(1);
	
	$sender = new XChat\Message\Crud( $message );
	$user_messages = $sender->get_user_messages();

	$data = array( 'messages' => $user_messages );

	echo "data: " . json_encode( $data ) . "\n\n";;
	
	return 0;

}