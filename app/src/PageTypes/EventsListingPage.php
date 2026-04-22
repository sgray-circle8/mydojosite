<?php

namespace App\PageTypes;

use App\DataObjects\Events\Event;
use Page;
use SilverStripe\ORM\DataList;

class EventsListingPage extends Page
{

    private static string $table_name = 'EventsListingPage';

    private static array $db = [];

    private static array $has_one = [];

    private static array $has_many = [
        'Events' => Event::class
    ];

    public function Events(): DataList
    {
        return Event::get()
            ->sort('StartDate', 'DESC');
    }

}
