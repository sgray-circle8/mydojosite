<?php

namespace App\DataObjects\Events;

use App\DataObjects\Events\Event;
use App\DataObjects\Events\EventVendorService;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;

class EventVendor extends DataObject
{

    private static string $table_name = 'EventVendor';

    private static string $singular_name = 'Vendor';

    private static array $db = [
        'VendorName' => 'Varchar',
        'VendorContactName' => 'Varchar',
        'VendorContactPhone' => 'Varchar',
        'VendorContactEmail' => 'Varchar',
        'VendorAddress' => 'Varchar',
    ];

    private static array $has_one = [
        'VendorService' => EventVendorService::class,
    ];

    private static array $belongs_many_many = [
        'Events' => Event::class,
    ];

    private static array $summary_fields = [
        'VendorName' => 'Vendor Name',
        'VendorContactName' => 'Contact',
        'VendorServiceName' => 'Provides',
        'VendorContactPhone' => 'Tel',
        'VendorContactEmail' => 'Email',
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(['VendorServiceID']);

        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create(
                'VendorServiceID',
                'Vendor Service',
                EventVendorService::get()
                    ->map('ID', 'ServiceName')
                    ->toArray()
            )->setEmptyString(''),
        );

        return $fields;
    }

    public function getVendorServiceName(): string
    {
        return $this->VendorService()->ServiceName;
    }

}
