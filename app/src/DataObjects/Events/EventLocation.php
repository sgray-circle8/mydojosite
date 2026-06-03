<?php

namespace App\DataObjects\Events;

use App\DataObjects\Events\EventVendor;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;

class EventLocation extends DataObject
{

    private static string $table_name = 'EventLocation';

    private static string $singular_name = 'Location';

    private static array $db = [
        'Title' => 'Varchar',
        'Address' => 'Varchar'
    ];

    private static array $has_one = [
        'ManagedBy' => EventVendor::class,
    ];

    private static array $summary_fields = [
        'Title' => 'Title',
        'Address' => 'Address',
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(['ManagedByID']);

        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create(
                'ManagedByID',
                'Managed By',
                EventVendor::get()
                    ->map('ID', 'VendorName')
                    ->toArray()
            )->setEmptyString(''),
        );

        return $fields;
    }
}
