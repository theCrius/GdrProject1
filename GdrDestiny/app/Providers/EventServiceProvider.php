<?php

namespace App\Providers;

use App\Events\UpdateDataUserPt1;
use App\Events\UpdateDataUserPt2;
use App\Listeners\SendUpdataDataToCheckAndToDb;
use App\Listeners\ChangeAndCheckingAllDataAboutUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UpdateDataUserPt1::class => [
            SendUpdataDataToCheckAndToDb::class
        ],
        UpdateDataUserPt2::class => [
            ChangeAndCheckingAllDataAboutUser::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
