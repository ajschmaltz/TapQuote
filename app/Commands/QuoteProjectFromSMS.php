<?php namespace App\Commands;

use App\Commands\Command;
use App\Events\ReceivedInvalidText;
use App\ProProject;
use App\Services\Operator;
use Illuminate\Contracts\Bus\SelfHandling;
use Event;
use App\Events\ProjectWasQuoted;

class QuoteProjectFromSMS extends Command implements SelfHandling {

  private $to;

  private $from;

  private $body;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($To, $From, $Body)
	{
    $this->to = $To;

		$this->from = $From;

    $this->body = $Body;
	}

	/**
	 * Finds the RFQ based on the incoming txt to/from
	 * If not, it fires ReceivedInvalidText event
	 * Creates and attaches a quote to the RFQ
	 * Fires ProjectWasQuoted event
	 *
	 * @return void
	 */
	public function handle(Operator $operator)
	{
    $rfq = ProProject::from($this->from)->to($this->to)->first();

    if(! $rfq)
    {
      return Event::fire(new ReceivedInvalidText($this->from));
    }

    $quote = $rfq->quote()->create(['body' => $this->body]);

    Event::fire(new ProjectWasQuoted($quote));
	}

}
