<?php

namespace App\DataObjects\Events;

use App\DataObjects\Events\EventParticipantDojo;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;

class EventParticipant extends DataObject
{

    private static string $table_name = 'EventParticipant';

    private static string $singular_name = 'Participant';

    private static array $db = [
        'GivenName' => 'Varchar',
        'FamilyName' => 'Varchar',
        'ContactEmail' => 'Varchar',
        'ContactPhone' => 'Varchar',
    ];

    private static array $has_one = [
        'HomeDojo' => EventParticipantDojo::class,
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(['HomeDojoID']);

        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create(
                'HomeDojoID',
                'Home Dojo',
                EventParticipantDojo::get()
                    ->map('ID', 'DojoName')
                    ->toArray()
            )->setEmptyString(''),
        );

        return $fields;
    }

    public function getFullName(): string
    {
        return $this->GivenName . ' ' . $this->FamilyName;
    }
}
