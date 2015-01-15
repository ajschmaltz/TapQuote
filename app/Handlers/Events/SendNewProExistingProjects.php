<?php namespace App\Handlers\Events;

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
    $to = $event->pro->cell;

    foreach($event->pro->projects as $project)
    {
      $from = $project->relay->number;
      $body = $project->desc;
      $photos = explode(',', $project->photos);

      $this->operator->sendMMS($to, $from, $body, $photos);

    }
	}

}
