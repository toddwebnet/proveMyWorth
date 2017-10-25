<?php

namespace App\Services;

use App\Jobs\TestJob;
use App\Models\TestJob as TestJobModel;
use Faker\Factory as Faker;
use Illuminate\Foundation\Bus\DispatchesJobs;

class TestJobService
{
    use DispatchesJobs;

    public static function dispatchTestJob()
    {
        $self = new self();
        $self->dispatch(new TestJob());
    }

    public static function workTestJob()
    {
        $faker = Faker::create();
        TestJobModel::create(['statement' => $faker->sentence()]);
    }
}