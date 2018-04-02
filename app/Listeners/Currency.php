<?php

namespace App\Listeners;

use App\Events\LocalhostRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use GuzzleHttp\Client;

use App\Api\PrivatExchangeRates;
use App\Api\RabbitMQ;

class Currency
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
     public function handle(LocalhostRequest $event)
     {
       $result = PrivatExchangeRates::currency()->format('json')->date($event->request->date)->send();

       RabbitMQ::sendMessage($result, 'Exchange');

     }
}
