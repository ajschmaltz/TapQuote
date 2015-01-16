<?php namespace App\Handlers\Events;

use App\Events\ProjectWasPosted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Services\Operator;
use Illuminate\Support\Facades\File;
use Knp\Snappy\Image;

class NewProjectNotificationForPros implements ShouldBeQueued {

  use InteractsWithQueue;

  private $operator;

  private $snappy;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(Operator $operator)
	{

	}

	/**
	 * Handle the event.
	 *
	 * @param  ProjectWasPosted  $event
	 * @return void
	 */
	public function handle(ProjectWasPosted $event)
	{


	}

}
