<?php

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\TestJob as TestJobModel;
use App\Services\SendEmailService;
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

    public function mailDispatch(){
        SendEmailService::sendMailDispatch(env('SEND_MAIL_TO'), env('SEND_MAIL_FROM'), 'Dispacthed: Test Subject', 'emails.test' );
    }
    public function mail()
    {
        SendEmailService::sendMail(env('SEND_MAIL_TO'), env('SEND_MAIL_FROM'), 'Test Subject', 'emails.test' );
    }
}
