<?php

namespace App\Handlers\Events;

use App\Events\ProWasRegistered;
use App\Services\Operator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendNewProExistingProjects implements ShouldBeQueued {

  use InteractsWithQueue;

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
	 * @param  ProWasRegistered  $event
	 * @return void
	 */
	public function handle(ProWasRegistered $event)
	{
    foreach($event->pro->projects as $project)
    {
      $this->operator->sendMMS(
        $event->pro->cell,
        $project->relay->number,
        $project->desc,
        $project->photos
      );
    }
	}

}
