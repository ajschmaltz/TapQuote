<?php namespace App\Handlers\Events;

use App\Events\ProWasRegistered;
use App\Services\Operator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendRegistrationConfirmationToPro implements ShouldBeQueued {

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
    $id = $event->pro->id;
    $name = $event->pro->name;
    $from = '407-477-4522';
    $body = "Welcome to TapQuote $name!  Manage your profile at http://tapquote.com/pro/$id";
		$this->operator->sendMMS($to, $from, $body);
	}

}
