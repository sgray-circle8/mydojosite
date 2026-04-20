<?php

namespace App\DataObjects\Events;

use App\Blocks\RecentEventsBlock;
use DateTime;
use EventsListingPage;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;

class Event extends DataObject
{
    private static string $table_name = 'Event';

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
        'HostDojo' => EventParticipantDojo::class,
        'RecentEventsBlock' => RecentEventsBlock::class,
        'EventListingPage' => EventsListingPage::class,
    ];

    private static array $many_many = [
        'Vendors' => EventVendor::class,
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'EventTypeID',
            'EventLocationID',
            'HostDojoID',
            'Vendors',
            'Details',
            'RecentEventsBlockID',
            'EventListingPageID',
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
                'HostDojoID',
                'Host Dojo',
                EventParticipantDojo::get()->map('ID', 'DojoName')
            )->setEmptyString('')
        );

        $fields->addFieldToTab(
            'Root.Main',
            TextField::create('FacebookURL', 'FB Event Page URL'),
        );

        $fields->addFieldToTab(
            'Root.Main',
            HTMLEditorField::create('Details', 'Details')
        );

        $config = GridFieldConfig_RecordEditor::create();

        /** @var GridFieldDataColumns $dataColumns */
        $dataColumns = $config->getComponentByType(GridFieldDataColumns::class);
        $dataColumns->setDisplayFields($summaryFields);

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

    public function EventHostDojo(): ?string
    {
        return $this->HostDojo()->DojoName;
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
