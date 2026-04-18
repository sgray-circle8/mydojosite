<?php
/*
 */
namespace {

    use App\DataObjects\Events\Event;
    use SilverStripe\Model\List\PaginatedList;
    use SilverStripe\ORM\DataList;

    class EventsListingPage extends Page
    {
        private static $db = [];

        private static $has_one = [];

        private static $has_many = [
            'Events' => Event::class
        ];

        public function Events(): DataList
        {
            return Event::get()
                ->sort('StartDate', 'DESC');
        }
    }

}

