<?php

namespace App\Tests\DataObjects;

use App\DataObjects\Events\EventVendorService;
use SilverStripe\Dev\SapphireTest;

class EventVendorServiceTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/EventVendorServiceTest.yml';

    public function testServiceNameProperty()
    {
        $service = $this->objFromFixture(EventVendorService::class, 'catering');

        $this->assertEquals('Catering', $service->ServiceName);
    }

    public function testServiceCount()
    {
        $this->assertEquals(2, EventVendorService::get()->count());
    }
}