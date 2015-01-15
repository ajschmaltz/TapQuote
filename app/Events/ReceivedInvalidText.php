<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class ReceivedInvalidText extends Event {

  public $from;

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($from)
	{
		$this->from = $from;
	}

}
