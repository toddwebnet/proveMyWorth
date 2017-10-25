<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use App\Models\Job;
use App\Models\TestJob as TestJobModel;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        return view("test.index");
    }

    public function testJob()
    {
        $this->dispatch(new TestJob());
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
