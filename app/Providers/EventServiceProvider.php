<?php namespace App\Providers;

use App\Events\ProjectWasPosted;
use App\Events\ProjectWasQuoted;
use App\Events\ProWasRegistered;
use App\Events\ReceivedInvalidText;
use App\Handlers\Events\NewProjectNotificationForUser;
use App\Handlers\Events\NewProjectNotificationForPros;
use App\Handlers\Events\SendInvalidTextResponse;
use App\Handlers\Events\SendNewProExistingProjects;
use App\Handlers\Events\SendQuoteToUser;
use App\Handlers\Events\SendRegistrationConfirmationToPro;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [

    ProjectWasPosted::class => [
      NewProjectNotificationForPro::class,
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
