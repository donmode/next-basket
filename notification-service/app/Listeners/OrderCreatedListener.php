<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class OrderCreated
{
    private $data;
    /**
     * Create the event listener.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Log::info("User created! details: " . $this->data);
    }
}
