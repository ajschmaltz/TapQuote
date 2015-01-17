<?php

namespace App\Handlers\Events;

use App\Events\ProjectWasPosted;
use App\Services\Operator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class NewProjectNotificationForUser  implements ShouldBeQueued {

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
	 * @param  ProjectWasPosted  $event
	 * @return void
	 */
	public function handle(ProjectWasPosted $event)
	{
    $this->operator->sendMMS(
      $event->project->cell,
      $event->project->relay->number,
      "You're project was received and we're alerting the qualified pros.  All quotes will come from this number."
    );
	}

}
