<?php

namespace App\Services;

use App\Jobs\GeoLocationJob;
use App\Models\Address;
use Illuminate\Foundation\Bus\DispatchesJobs;

class  GeoLocationService
{

    use DispatchesJobs;

    public static function setGoogleCoodinatesViaQueue(Address $address)
    {
        $self = new self();
        $self->dispatch(new GeoLocationJob());
    }

    public static function setGoogleCoordinates(Address $address)
    {
        $latLong = self::getGoogleCoordinates($address);
        // only update if changed (this prevents recursive updates in the observer
        if (
            $address->latitude != $latLong['latitude'] ||
            $address->longitude || $latLong['longitude']
        ) {
            $address->latitude = $latLong['latitude'];
            $address->longitude = $latLong['longitude'];
            $address->update();
        }
    }

    public static function getGoogleCoordinates(Address $address)
    {

        $addressString = str_replace(" ", "+", $address->fullAddress()); // replace all the white space with "+" sign to match with google search pattern
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$addressString";

        set_error_handler(
            create_function(
                '$severity, $message, $file, $line',
                'throw new ErrorException($message, $severity, $severity, $file, $line);'
            )
        );

        try {
            $response = file_get_contents($url);
        } catch (Exception $e) {
            return array(
                'latitude' => null,
                'longitude' => null
            );
        }

        restore_error_handler();

        $json = json_decode($response, TRUE); //generate array object from the response from the web

        if (isset($json['results'][0])) {
            return array(
                'latitude' => $json['results'][0]['geometry']['location']['lat'],
                'longitude' => $json['results'][0]['geometry']['location']['lng']
            );
        } else {
            return array(
                'latitude' => null,
                'longitude' => null
            );
        }
    }
}