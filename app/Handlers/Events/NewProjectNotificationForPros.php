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
		$this->operator = $operator;
    $this->snappy = new Image(base_path() . '/vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64');
	}

	/**
	 * Handle the event.
	 *
	 * @param  ProjectWasPosted  $event
	 * @return void
	 */
	public function handle(ProjectWasPosted $event)
	{
    $this->snappy->setOption('quality', 100);
    $this->snappy->setOption('width', 170);
    $image = $this->snappy->getOutput('http://tapquote.com/project/' . $event->project->id);
    $filename = 'project-' . $event->project->id . '.png';
    File::put($filename, $image);

    $from = $event->project->relay->number;
    $pros = $event->project->pros;
    $body = $event->project->desc;
    $photos = [];
    $photos[0] = "http://tapquote.com/".$filename;
    $photos[0] = "http://mainstreetmower.com/tqlogo.png";

    foreach($pros as $to)
    {
      $this->operator->sendMMS($to->cell, $from, $body, $photos);
    }
	}

}
