<?php
namespace XChat\Message;

class Message {

	protected $body = '';
	protected $user_id = 0;
	protected $datetime = '';

	public function set_body( $content = '' ) {
		$this->body = $content;
	}
	public function set_user_id( $user_id = 0 ) {
		$this->user_id = absint( $user_id );
	}
	public function set_date_time( \DateTime $datetime ) {
		$this->datetime = $datetime;
	}

	public function get_body() {
		return $this->body;
	}
	public function get_user_id() {
		return $this->user_id;
	}
	public function get_date_time() {
		return $this->date_time;
	}

}