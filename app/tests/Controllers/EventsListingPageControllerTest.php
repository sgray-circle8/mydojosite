<?php

namespace App\Tests\Controllers;

use App\PageTypes\EventsListingPage;
use App\PageTypes\EventsListingPageController;
use SilverStripe\Dev\FunctionalTest;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Model\List\PaginatedList;

class EventsListingPageControllerTest extends FunctionalTest
{
    protected static $fixture_file = 'app/tests/fixtures/EventsListingPageControllerTest.yml';

    /**
     * Helper method to fetch and publish the mock event listing page
     */
    protected function getPublishedPage(): EventsListingPage
    {
        /** @var EventsListingPage $page */
        $page = $this->objFromFixture(EventsListingPage::class, 'events_page');
        $page->publishRecursive();

        return $page;
    }

    /**
     * Tests that the events listing page can be rendered via routing
     */
    public function testEventsPageLoads(): void
    {
        $page = $this->getPublishedPage();
        $response = $this->get($page->Link());

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Tests that PaginatedEvents() successfully returns a PaginatedList type wrapper
     */
    public function testPaginatedEventsReturnsCorrectType(): void
    {
        $page = $this->getPublishedPage();
        $controller = EventsListingPageController::create($page);

        $controller->setRequest(new HTTPRequest('GET', $page->Link()));

        $eventsList = $controller->PaginatedEvents();

        $this->assertInstanceOf(PaginatedList::class, $eventsList);
        $this->assertEquals(3, $eventsList->count());
    }

    /**
     * Tests that the list of events is ordered by 'StartDate DESC'
     */
    public function testPaginatedEventsAreSortedChronologicallyDescending(): void
    {
        $page = $this->getPublishedPage();
        $controller = EventsListingPageController::create($page);
        $controller->setRequest(new HTTPRequest('GET', $page->Link()));

        $eventsList = $controller->PaginatedEvents();
        $items = $eventsList->toArray();

        // First item should be the furthest in the future (New Year's Gala)
        $this->assertEquals('New Year\'s Gala', $items[0]->Title);
        $this->assertEquals('2026-12-31', $items[0]->StartDate);

        // Second item should be the mid-year event (Mid-year Festival)
        $this->assertEquals('Mid-year Festival', $items[1]->Title);
        $this->assertEquals('2026-06-01', $items[1]->StartDate);

        // Last item should be the earliest historical event (Old Concert)
        $this->assertEquals('Past Seminar', $items[2]->Title);
        $this->assertEquals('2026-01-01', $items[2]->StartDate);
    }

    /**
     * Tests that pagination limits dynamically alter the visible item counts
     */
    public function testPaginationRespectsRequestParameters(): void
    {
        $page = $this->getPublishedPage();
        $controller = EventsListingPageController::create($page);

        // Pass mock 'start' parameter to simulate navigating to the next page
        // Set internal page length constraint on the PaginatedList to 1 item per page
        $request = new HTTPRequest('GET', $page->Link(), ['start' => 1]);
        $controller->setRequest($request);

        $eventsList = $controller->PaginatedEvents();
        $eventsList->setPageLength(1);

        // Check total items globally vs visible items in the current pagination window
        $this->assertEquals(3, $eventsList->getTotalItems());
        $this->assertEquals(1, $eventsList->count());

        // Given a start offset of 1, item index 0 should map to the second element ('Mid-year Festival')
        $this->assertEquals('Mid-year Festival', $eventsList->toArray()[0]->Title);
    }
}