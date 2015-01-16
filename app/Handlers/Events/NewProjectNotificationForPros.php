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
    $this->snappy->setOption('width', 800);
    $photos = [];

    foreach($event->project->photos as $photo)
    {
      $image = $this->snappy->getOutput('http://tapquote.com/photos/' . $photo->id);
      $filename = 'project-' . $event->project->id . '-photo-' . $photo->id .'.jpg';
      File::put($filename, $image);
      $photos[] = "http://tapquote.com/".$filename;
    }

    $from = $event->project->relay->number;
    $pros = $event->project->pros;
    $body = $event->project->desc;

    foreach($pros as $to)
    {
      $this->operator->sendMMS($to->cell, $from, $body, $photos);
    }
	}

}
