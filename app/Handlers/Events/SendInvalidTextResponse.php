<?php

namespace App\Handlers\Events;

use App\Events\ReceivedInvalidText;

use App\Services\Operator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendInvalidTextResponse {

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
	 * Handles invalid texts.
	 *
	 * @param  ReceivedInvalidText  $event
	 * @return void
	 */
	public function handle(ReceivedInvalidText $event)
	{
    $to = $event->from;
    $from = "+14074774522";
    $body = "Sorry, we received an invalid text - TapQuote";
		$this->operator->sendMMS($to, $from, $body);
	}

}
