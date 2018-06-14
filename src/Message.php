<?php
namespace XChat\Message;

class Message {

	protected $body = '';
	protected $sender_id = 0;
	protected $receiver_id = 0;
	protected $channel_id = 0;
	protected $datetime = '';

	public function __construct() {
		$date = new \DateTime();
		$this->datetime = $date->format('Y-m-d H:i:s');
	}

	public function set_body( $content = '' ) {
		$this->body = $content;
	}
	
	public function set_sender_id( $sender_id = 0 ) {
		$this->sender_id = absint( $sender_id );
	}
	
	public function set_receiver_id( $receiver_id = 0 ) {
		$this->receiver_id = absint( $receiver_id );
	}

	public function set_channel_id( $channel_id = 0 ) {
		$this->channel_id = absint( $channel_id );
	}

	public function get_body() {
		return $this->body;
	}

	public function get_sender_id() {
		return $this->sender_id;
	}

	public function get_receiver_id() {
		return $this->receiver_id;
	}

	public function get_channel_id() {
		return $this->channel_id;
	}

	public function get_date_time() {
		return $this->datetime;
	}

}