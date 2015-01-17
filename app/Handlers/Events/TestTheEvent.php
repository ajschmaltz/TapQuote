<?php namespace App\Handlers\Events;

use App\Events\ProjectWasPosted;

use App\Relay;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class TestTheEvent implements ShouldBeQueued {

  use InteractsWithQueue;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  ProjectWasPosted  $event
	 * @return void
	 */
	public function handle(ProjectWasPosted $event)
	{
    Relay::truncate();
	}

}
