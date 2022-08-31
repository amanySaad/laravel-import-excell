<?php

namespace App\Listeners;

use App\Events\ProductsUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class FlushCacheForListing
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
     * @param  \App\Events\ProductsUpdated  $event
     * @return void
     */
    public function handle(ProductsUpdated $event)
    {
        /* Flush Caching*/
        Cache::forget($event->cache_key);

    }
}
