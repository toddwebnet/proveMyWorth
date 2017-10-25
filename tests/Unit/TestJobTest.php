<?php

namespace Tests\Unit;

use App\Models\TestJob;
use App\Services\TestJobService;
use Tests\AppTestCase;

class TestJobTest extends AppTestCase
{
    public function testTestJob()
    {
        $numJobsBefore = $this->getTestJobsCount();

        TestJobService::workTestJob();

        $numJobsAfter = $this->getTestJobsCount();

        // assumes there is 1 new entry into the test_jobs table
        $this->assertEquals(($numJobsAfter-$numJobsBefore), 1);
    }

    private function getTestJobsCount()
    {
        return TestJob::all()->count();
    }
}