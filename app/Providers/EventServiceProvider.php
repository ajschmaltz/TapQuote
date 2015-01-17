<?php namespace App\Providers;

use App\Events\ProjectWasPosted;
use App\Events\ProjectWasQuoted;
use App\Events\ProsWereConnectedToProject;
use App\Events\ProWasRegistered;
use App\Events\ReceivedInvalidText;
use App\Handlers\Events\ConnectProsToProject;
use App\Handlers\Events\NewProjectNotificationForUser;
use App\Handlers\Events\NewProjectNotificationForPros;
use App\Handlers\Events\ReserveNumber;
use App\Handlers\Events\SendInvalidTextResponse;
use App\Handlers\Events\SendNewProExistingProjects;
use App\Handlers\Events\SendQuoteToUser;
use App\Handlers\Events\SendRegistrationConfirmationToPro;
use App\Handlers\Events\TestMe;
use App\Handlers\Events\TestTheEvent;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],

    ProjectWasPosted::class => [
      TestTheEvent::class,
      NewProjectNotificationForUser::class,
    ],

    ProjectWasQuoted::class => [
      SendQuoteToUser::class
    ],

    ProWasRegistered::class => [
      SendRegistrationConfirmationToPro::class,
      SendNewProExistingProjects::class,
    ],

    ReceivedInvalidText::class => [
      SendInvalidTextResponse::class,
    ],
	];

}
