<?php

namespace App\Handlers\Events;

use App\Events\ProjectReady;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Services\Operator;

class NewProjectNotificationForPros implements ShouldBeQueued {

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
	 * @param  ProjectReady  $event
	 * @return void
	 */
	public function handle(ProjectReady $event)
	{
    $this->operator->sendMMS(
      $event->project->pros->lists('cell'),
      $event->project->relay->number,
      $event->project->desc,
      $event->project->photos->lists('src')
    );
	}

}
