<?php

namespace App\PageTypes;

use App\DataObjects\Events\Event;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Model\List\PaginatedList;

class EventsListingPageController extends ContentController
{

    private static array $allowed_actions = [];

    protected function init()
    {
        parent::init();
    }


    /**
     * Returns a paginated list of all pages in the site.
     */
    public function PaginatedEvents(): PaginatedList
    {
        $eventList = Event::get()->sort('StartDate', 'DESC');

        return PaginatedList::create($eventList, $this->getRequest());
    }

}
