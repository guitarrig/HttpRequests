<?php

namespace App\Providers;
use Illuminate\Support\Facades\Event;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\LocalhostRequest' => [
            'App\Listeners\Currency',
        ],
    ];


    public function boot()
    {
        parent::boot();

        //
    }
}
