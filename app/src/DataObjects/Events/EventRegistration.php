<?php

namespace App\DataObjects\Events;

use SilverStripe\Forms\CurrencyField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;

class EventRegistration extends DataObject
{

    private static string $table_name = 'EventRegistration';

    private static string $singular_name = 'Registration';

    private static array $db = [
        'PaymentDate' => 'Date',
        'PaymentAmount' => 'Currency',
        'Memo' => 'Text',
    ];

    private static array $has_one = [
        'Event' => Event::class,
        'EventParticipant' => EventParticipant::class,
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'EventID',
            'EventParticipantID',
            'PaymentAmount',
            'PaymentDate',
            'Memo',
            ]);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                DropdownField::create(
                    'EventParticipantID',
                    'Participant',
                    EventParticipant::get()
                        ->map('ID', 'FullName')
                        ->toArray()
                )->setEmptyString(''),
                DropdownField::create(
                    'EventID',
                    'Event',
                    Event::get()
                        ->map()
                        ->toArray()
                )->setEmptyString(''),
                CurrencyField::create(
                    'PaymentAmount',
                    'Amount Paid',
                ),
                DateField::create(
                    'PaymentDate',
                    'Date Paid',
                ),
                TextareaField::create(
                    'Memo',
                    'Memo',
                ),
            ]
        );

        return $fields;
    }

    public function getEventTitle(): string
    {
        if ($this->Event()->exists()) {
            return $this->Event()->Title;
        }

        // Fallback
        return '#' . $this->ID . ' Registration';
    }

    public function getEventParticipantFullName(): string{
        if ($this->EventParticipant()->exists()) {
            return $this->EventParticipant()->GivenName . ' ' . $this->EventParticipant()->FamilyName;
        }

        // Fallback
        return '#' . $this->ID . ' Unknown participant';
    }

    public function getRegistrationFormattedPaymentAmount(): string
    {
        $pmtAmountRaw = $this->PaymentAmount;

        $pmtAmountDecimals = number_format($pmtAmountRaw, 2);

        return '$' . $pmtAmountDecimals;
    }

}
