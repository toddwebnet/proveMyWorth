<?php

namespace App\Observers;

use App\Models\Address;
use App\Models\UserProfile;

class UserObserver
{
    public function created($model)
    {


        $address = Address::create([
            'street' => '',
            'city' => '',
            'state' => '',
            'zip' => '',
            'latitude' => '',
            'longitude' => '',
        ]);
        $userProfile = UserProfile::create([
            'user_id' => $model->id,
            'birthdate' => '1955-11-05',
            'phone_number' => '',
            'address_id' => $address->id,
        ]);

    }
}