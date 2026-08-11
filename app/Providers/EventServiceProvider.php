<?php

namespace App\Providers;

Use App\Events\SeriesCreated;
use App\Listeners\LogSeriesCreated;
use App\Listeners\EmailUsersAboutSeriesCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     * 
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        seriesCreated::class => [
            EmailUsersAboutSeriesCreated::class,
            LogSeriesCreated::class,
        ],
    ];
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {   
        //
    }
}
