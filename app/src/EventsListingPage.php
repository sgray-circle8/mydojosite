<?php
/*
 */
namespace {

    use App\DataObjects\Events\Event;
    use SilverStripe\ORM\DataList;

    class EventsListingPage extends Page
    {
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

}

