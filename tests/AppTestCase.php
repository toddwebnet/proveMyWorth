<?php
namespace Tests;

use Illuminate\Support\Facades\Artisan;

class AppTestCase extends TestCase
{

    public function createApplication()
    {
        putenv('DB_DEFAULT=sqlite_testing');

        $app = require __DIR__  .'/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

}