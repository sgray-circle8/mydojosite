<?php

namespace App\DataObjects\Events;

use App\Blocks\RecentEventsBlock;
use App\PageTypes\EventsListingPage;
use DateTime;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\ORM\DataObject;

class Event extends DataObject
{
    private static string $table_name = 'Event';

    private static string $singular_name = 'Event';

    private static string $plural_name = 'Events';

    private static array $db = [
        'Title' => 'Varchar',
        'StartDate' => 'Date',
        'EndDate' => 'Date',
        'StartTime' => 'Time',
        'EndTime' => 'Time',
        'Details' => 'HTMLText',
        'FacebookURL' => 'Varchar',
    ];

    private static array $has_one = [
        'EventImage' => Image::class,
        'EventType' => EventType::class,
        'EventLocation' => EventLocation::class,
        'EventHost' => EventHost::class,
        'RecentEventsBlock' => RecentEventsBlock::class,
        'EventListingPage' => EventsListingPage::class,
        'EventRegistrationLink' => Link::class
    ];

    private static array $many_many = [
        'Vendors' => EventVendor::class,
    ];

    private static array $owns = [
        'EventRegistrationLink',
    ];

    private static array $summaryFields = [
        'Title' => 'Title',
        'EventLocation' => 'Location',
        'StartDate' => 'Date',
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'EventTypeID',
            'EventLocationID',
            'EventHostID',
            'Vendors',
            'Details',
            'RecentEventsBlockID',
            'EventListingPageID',
            'EventRegistrationLinkID',
        ]);

        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create(
                'EventTypeID',
                'Event Type',
                EventType::get()->map('ID', 'EventTypeName')
            )->setEmptyString('')
        );

        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create(
                'EventLocationID',
                'Event Location',
                EventLocation::get()->map('ID', 'Title')
            )->setEmptyString('')
        );

        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create(
                'EventHostID',
                'Event Host',
                EventHost::get()->map('ID', 'EventHostName')
            )->setEmptyString('')
        );

        $fields->addFieldToTab(
            'Root.Main',
            TextField::create('FacebookURL', 'FB Event Page URL'),
        );

        $fields->addFieldToTab(
            'Root.Main',
            LinkField::create(
                'EventRegistrationLinkID',
                'Registration Link',
            ),
        );

        $fields->addFieldToTab(
            'Root.Main',
            HTMLEditorField::create('Details', 'Details')
        );

        $config = GridFieldConfig_RecordEditor::create();
        $dataColumns = $config->getComponentByType(GridFieldDataColumns::class);
        $dataColumns->setDisplayFields($this->summaryFields());

        return $fields;
    }

    public function getEventLocationTitle(): ?string
    {
        return $this->EventLocation()->Title;
    }

    public function getEventLocationAddress(): ?string
    {
        return $this->EventLocation()->Address;
    }

    public function EventEventHost(): ?string
    {
        return $this->EventHost()->EventHostName;
    }

    public function EventHostURL(): ?string
    {
        return $this->EventHost()->EventHostURL;
    }

    public function IsPast(): bool
    {
        if (!$this->StartDate && !$this->EndDate) {
            return false;
        }

        $today = new DateTime();

        if ($this->EndDate) {
            $endDate = new DateTime($this->EndDate);
            return $endDate < $today;
        } else {
            $startDate = new DateTime($this->StartDate);
            return $startDate < $today;
        }
    }
}
