<?php

namespace App\Services;

use App\Models\TestJob as TestJobModel;
use Faker\Factory as Faker;

class TestJobService
{
    public static function workTestJob()
    {
        $faker = Faker::create();
        TestJobModel::create(['statement' => $faker->sentence()]);
    }
}