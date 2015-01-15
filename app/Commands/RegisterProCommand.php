<?php namespace App\Commands;

use App\Commands\Command;
use App\Pro;
use App\Project;
use Illuminate\Contracts\Bus\SelfHandling;
use Event;
use App\Events\ProWasRegistered;

class RegisterProCommand extends Command implements SelfHandling {

  private $pro;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($pro)
	{
    $this->pro = new Pro($pro);
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$this->pro->save();

    $this->pro->projects()->sync(
      Project::qualified($this->pro)->lists('id')
    );

    Event::fire(new ProWasRegistered($this->pro));
	}

}
