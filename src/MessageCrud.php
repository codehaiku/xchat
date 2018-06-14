<?php
namespace XChat\Message;

class Crud {
	
	protected $message;

	public function __construct( Message $message ) {
		$this->message = $message;
	}

	public function send(){
		$this->save( $this->message );
	}

	public function get_user_messages() {
		global $wpdb;
		$results = $wpdb->get_results( 
			$wpdb->prepare("SELECT * FROM {$wpdb->prefix}xchat_messages WHERE receiver_id = %d", 
				$this->message->get_receiver_id()
			), 
			OBJECT
		);

		return $results;
	}

	public function save() {

		global $wpdb;
	
		$data = array(
				'sender_id' => $this->message->get_sender_id(),
				'body' => $this->message->get_body(),
				'channel_id' => $this->message->get_channel_id(),
				'receiver_id' => $this->message->get_receiver_id(),
				'date_created' => $this->message->get_date_time(),
			);
		$format = array(
			'%d', // Send id.
			'%s', // Body.
			'%d', // Channel Id.
			'%d', // Receiver Id.
			'%s', // Date created.
		);

		$wpdb->insert( $wpdb->prefix . 'xchat_messages', $data, $format );

	}

}