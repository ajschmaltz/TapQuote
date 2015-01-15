<?php namespace App\Commands;

use App\Commands\Command;
use App\Pro;
use App\Project;
use App\Relay;
use Illuminate\Contracts\Bus\SelfHandling;
use Event;
use App\Events\ProjectWasPosted;

class PostProjectCommand extends Command implements SelfHandling {

  private $project;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($project)
	{
    $this->project = new Project($project);
	}

	/**
	 * Saves the Project, finds qualified professionals and
   * fires the ProjectWasPosted Event.
	 *
	 * @return void
	 */
	public function handle()
	{

    $this->project->relay()->associate(
      Relay::available($this->project)->first()
    );

    $this->project->save();

    $this->project->pros()->sync(
      Pro::qualified($this->project)->lists('id')
    );

    Event::fire(new ProjectWasPosted($this->project));
	}

}
