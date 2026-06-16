<?php

namespace App\Tests\DataObjects;

use App\DataObjects\Events\EventVendor;
use SilverStripe\Dev\SapphireTest;

class EventVendorTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/EventVendorTest.yml';

    public function testVendorDetailsAndService()
    {
        $vendor = $this->objFromFixture(EventVendor::class, 'catering');

        $this->assertEquals('Catering Experts', $vendor->VendorName);
        $this->assertEquals('Food Service', $vendor->getVendorServiceName());
        $this->assertTrue($vendor->VendorService()->exists());
    }
}