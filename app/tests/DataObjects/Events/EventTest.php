<?php

namespace App\Tests\DataObjects;

use App\DataObjects\Events\Event;
use SilverStripe\Dev\SapphireTest;

class EventTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/EventTest.yml';

    public function testIsPast()
    {
        $futureEvent = $this->objFromFixture(Event::class, 'future_event');
        $pastEvent = $this->objFromFixture(Event::class, 'past_event');

        $this->assertFalse($futureEvent->IsPast(), 'Future event should not be marked as past');
        $this->assertTrue($pastEvent->IsPast(), 'Past event should be marked as past');
    }

    public function testEventTitle()
    {
        $event = $this->objFromFixture(Event::class, 'future_event');
        $this->assertEquals('Upcoming Conference', $event->Title);
    }

    public function testEventRelationships()
    {
        $event = $this->objFromFixture(Event::class, 'my_event');

        // Verify has_one relationship (Host)
        $this->assertNotNull($event->EventHostID, 'Event should have a host assigned');
        $this->assertEquals('Tech Conference Pros', $event->EventHost()->EventHostName);

        // Verify many_many relationship (Vendors)
        $this->assertEquals(1, $event->Vendors()->count(), 'Event should have exactly one vendor');
        $this->assertEquals('Catering Experts', $event->Vendors()->first()->VendorName);
    }
}
