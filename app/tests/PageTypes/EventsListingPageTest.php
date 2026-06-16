<?php

namespace App\Tests\PageTypes;

use App\PageTypes\EventsListingPage;
use SilverStripe\Dev\FunctionalTest;

class EventsListingPageTest extends FunctionalTest
{
    protected static $fixture_file = 'app/tests/fixtures/EventsListingPageTest.yml';

    public function testEventsMethodReturnsSortedEvents()
    {
        $page = $this->objFromFixture(EventsListingPage::class, 'event_page');
        $events = $page->Events();

        // Confirm there are 2 events
        $this->assertEquals(2, $events->count());

        // Confirm past / future
        $this->assertEquals('Future Event', $events->first()->Title);
        $this->assertEquals('Past Event', $events->last()->Title);
    }
}