<?php

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\TestJob as TestJobModel;
use App\Services\TestJobService;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        return view("test.index");
    }

    public function testJob()
    {
        TestJobService::dispatchTestJob();

    }

    public function results()
    {
        $data = [
            'jobs' => Job::all()->toArray(),
            'testJobs' => TestJobModel::all()->toArray()
        ];
        dd($data);
    }
}
