<?php namespace App\Handlers\Events;

use App\Events\ProjectWasQuoted;
use App\Services\Operator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendQuoteToUser implements ShouldBeQueued {

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
	 * Sends the quote to the user.
	 *
	 * @param  ProjectWasQuoted  $event
	 * @return void
	 */
	public function handle(ProjectWasQuoted $event)
	{
    $to = $event->quote->rfq->project->cell;
    $from = $event->quote->rfq->project->relay->number;
    $body = $event->quote->body . ' - quoted by ' . $event->quote->rfq->pro->name;

		$this->operator->sendMMS($to, $from, $body);
	}

}
