<?php

namespace App\DataObjects\Events;

use App\DataObjects\Events\EventVendor;
use App\DataObjects\Events\EventParticipantDojo;
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
        'EventType' => EventType::class,
        'EventLocation' => EventLocation::class,
        'HostDojo' => EventParticipantDojo::class,
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
            'Details',
        ]);

        // Has One Relationships
        $fields->removeByName([
            'EventTypeID',
            'EventLocationID',
            'HostDojoID',
            'Registrations',
            'Vendors',
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

        // 1. Create the configuration
        $config = GridFieldConfig_RecordEditor::create();

        // 2. Define the desired summary fields for the EventRegistration GridField
        $summaryFields = [
            // These field names must exist on the EventRegistration class (either in $db, $has_one, or as a method)
            'EventParticipant.FullName' => 'Participant', // Accesses the related Participant's FullName
            'PaymentDate' => 'Date Paid',
            'PaymentAmount' => 'Amount',
            // If you have a custom method on EventRegistration to format the payment, use it:
            // 'RegistrationFormattedPaymentAmount' => 'Paid',
            'Memo' => 'Memo',
        ];

        // 3. Get the DataColumns component and set the display fields
        /** @var GridFieldDataColumns $dataColumns */
        $dataColumns = $config->getComponentByType(GridFieldDataColumns::class);
        $dataColumns->setDisplayFields($summaryFields);

        $fields->addFieldToTab(
            'Root.Registrations', // The tab title
            GridField::create(
                'Registrations', // Field name
                'Event Registrations', // Label displayed above the GridField
                $this->Registrations(), // Source DataList
                $config // Pass the configured object
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
