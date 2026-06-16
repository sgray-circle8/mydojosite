<?php

namespace App\Tests\DataObjects;

use App\DataObjects\Events\EventLocation;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class EventLocationTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/EventLocationTest.yml';

    public function testManagedByRelationship()
    {
        $location = $this->objFromFixture(EventLocation::class, 'office_location');

        $this->assertTrue($location->ManagedBy()->exists(), 'Location should have a managing vendor');
        $this->assertEquals('City Property Management', $location->ManagedBy()->VendorName);
    }

    public function testGetCMSFields()
    {
        $location = new EventLocation();
        $fields = $location->getCMSFields();

        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('ManagedByID'), 'ManagedByID dropdown should be in CMS fields');
    }
}