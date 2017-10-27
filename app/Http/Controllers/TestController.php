<?php

namespace App\Http\Controllers;


use App\Models\Address;
use App\Models\Job;
use App\Models\TestJob as TestJobModel;
use App\Services\GeoLocationService;
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

    public function mailDispatch()
    {
        SendEmailService::sendMailDispatch(env('MAIL_TO_ADDRESS'), env('MAIL_FROM_ADDRESS'), 'Dispacthed: Test Subject', 'emails.test');
    }

    public function mail()
    {
        SendEmailService::sendMail(env('MAIL_TO_ADDRESS'), env('MAIL_FROM_ADDRESS'), 'Test Subject', 'emails.test');
    }

    public function geo()
    {
        $address = Address::create([
            'street' => '20514 Rainstone Ct',
            'city' => 'Katy',
            'state' => 'TX',
            'zip' => '77449',
        ]);

        GeoLocationService::setGoogleCoordinates($address);
        $address = Address::find($address->id);
        //dump($address->toArray());
        $address->state="TX";
        $address->save();

        //$address->delete();
    }
}
