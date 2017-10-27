<?php

namespace App\Jobs;

use App\Services\GeoLocationService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GeoLocationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  public $address;
    public function __construct($address)
    {
        $this->address = $address;
    }


    public function handle()
    {
        GeoLocationService::setGoogleCoordinates($this->address);
    }
}