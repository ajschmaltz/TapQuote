<?php namespace App\Commands;

use App\Commands\Command;
use App\Photo;
use App\Pro;
use App\Project;
use App\Relay;
use Illuminate\Contracts\Bus\SelfHandling;
use Event;
use App\Events\ProjectWasPosted;

class PostProjectCommand extends Command implements SelfHandling {

  private $project;

  private $photos;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($project, $photos)
	{
    $this->project = new Project($project);
    $this->photos = $photos;
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

    foreach($this->photos as $photo)
    {
      $this->project->save(new Photo($photo));
    }

    $this->project->pros()->sync(
      Pro::qualified($this->project)->lists('id')
    );

    Event::fire(new ProjectWasPosted($this->project));
	}

}
