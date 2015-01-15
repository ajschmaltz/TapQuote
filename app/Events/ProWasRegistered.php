<?php namespace App\Events;

use App\Events\Event;
use App\Pro;
use Illuminate\Queue\SerializesModels;

class ProWasRegistered extends Event {

	use SerializesModels;

  public $pro;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Pro $pro)
	{
		$this->pro = $pro;
	}

}
