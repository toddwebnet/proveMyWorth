<?php

namespace App\Observers;

use App\Models\Address;
use App\Services\GeoLocationService;

class AddressObserver
{
    public function created($model)
    {
        // disabled because all are created via observer with empty values
        // GeoLocationService::setGoogleCoordinates($model);
    }

    public function updated($model)
    {
        $dirty = $model->getDirty();
        if (
            (
                array_key_exists('street', $dirty) ||
                array_key_exists('city', $dirty) ||
                array_key_exists('state', $dirty) ||
                array_key_exists('zip', $dirty)
            ) && !(
                array_key_exists('latitude', $dirty) ||
                array_key_exists('longitude', $dirty)
            )) {
            GeoLocationService::setGoogleCoodinatesViaQueue($model);
        }
    }
}