<?php

namespace App\Tests\DataObjects;

use App\DataObjects\Events\EventType;
use SilverStripe\Dev\SapphireTest;

class EventTypeTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/EventTypeTest.yml';

    public function testEventTypeProperties()
    {
        $type = $this->objFromFixture(EventType::class, 'workshop');

        $this->assertEquals('Workshop', $type->EventTypeName);
    }

    public function testQueryingEventTypes()
    {
        $count = EventType::get()->count();
        $this->assertEquals(2, $count, 'Should have 2 EventTypes in the database');
    }
}