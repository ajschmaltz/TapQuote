<?php namespace App\Handlers\Events;

use App\Events\ProjectReady;
use App\Events\ProjectWasPosted;

use App\Relay;
use App\Services\Operator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Event;

class ReserveRelay {

  private $operator;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(Operator $operator)
	{
		$this->operator = $operator;
	}

	/**
	 * Handle the event.
	 *
	 * @param  ProjectWasPosted  $event
	 * @return void
	 */
	public function handle(ProjectWasPosted $event)
	{
    $this->operator->reserveRelay($event->project);
    Event::fire(new ProjectReady($event->project));
	}

}
