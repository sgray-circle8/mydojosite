<?php

namespace App\DataObjects\Events;

use App\Blocks\RecentEventsBlock;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
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
    ];

    private static array $has_one = [
        'EventImage' => Image::class,
        'EventType' => EventType::class,
        'EventLocation' => EventLocation::class,
        'HostDojo' => EventParticipantDojo::class,
        'RecentEventsBlock' => RecentEventsBlock::class,
    ];

    private static array $has_many = [
        'Registrations' => EventRegistration::class,
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
            'Registrations',
            'Vendors',
            'Details',
            'RecentEventsBlockID'
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
            HTMLEditorField::create('Details', 'Details')
        );

        $config = GridFieldConfig_RecordEditor::create();

        $summaryFields = [
            'EventParticipant.FullName' => 'Participant',
            'PaymentDate' => 'Date Paid',
            'PaymentAmount' => 'Amount',
            'Memo' => 'Memo',
        ];

        /** @var GridFieldDataColumns $dataColumns */
        $dataColumns = $config->getComponentByType(GridFieldDataColumns::class);
        $dataColumns->setDisplayFields($summaryFields);

        $fields->addFieldToTab(
            'Root.Registrations',
            GridField::create(
                'Registrations',
                'Event Registrations',
                $this->Registrations(),
                $config
            )
        );

        return $fields;
    }

    public function getNumberRegistrations(): int
    {
        return $this->Registrations()->count();
    }

    public function getTotalRegistrationPmtReceived(): string
    {
        $sumRegPmtRaw = $this->Registrations()->sum('PaymentAmount');
        $sumRegPmtDecimals = number_format($sumRegPmtRaw, 2, '.', '');

        return '$' . $sumRegPmtDecimals;
    }
}
