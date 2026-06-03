<?php

namespace App\DataObjects\Events;

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDataColumns;

class EventAdmin extends ModelAdmin
{
    private static string $menu_title = 'Events';

    private static string $url_segment = 'event-admin';

    private static float $menu_priority = -0.20;

    private static array $managed_models = [
        Event::class,
        EventHost::class,
        EventType::class,
        EventLocation::class,
        EventVendor::class,
        EventVendorService::class,
    ];

    private static array $summaryFields = [
        'Title' => 'Title',
        'EventLocation' => 'EventLocation',
        'StartDate' => 'Date',
    ];

    public function getEditForm($id = null, $fields = null): Form
    {
        $form = parent::getEditForm($id, $fields);

        $modelGridFieldConfig = GridFieldConfig_RecordEditor::create();

        if ($this->modelClass === Event::class) {
            $summaryFields = [
                'EventImage.CMSThumbnail' => 'Image',
                'Title' => 'Title',
                'EventLocation.Title' => 'Location',
                'StartDate' => 'Date',
            ];

            $modelGridField = GridField::create(
                'Event',
                'Event',
                Event::get(),
                $modelGridFieldConfig
            );
        } elseif ($this->modelClass === EventVendorService::class) {
            $summaryFields = [
                'ServiceName' => 'Service Name',
            ];

            $modelGridField = GridField::create(
                'EventVendorService',
                'Service',
                EventVendorService::get(),
                $modelGridFieldConfig
            );
        } elseif ($this->modelClass === EventVendor::class) {
            $summaryFields = [
                'VendorName' => 'Vendor Name',
                'VendorContactName' => 'Contact',
                'VendorServiceName' => 'Provides',
                'VendorContactPhone' => 'Tel',
                'VendorContactEmail' => 'Email',
            ];

            $modelGridField = GridField::create(
                'EventVendor',
                'Vendor',
                EventVendor::get(),
                $modelGridFieldConfig
            );
        } elseif ($this->modelClass === EventHost::class) {
            $summaryFields = [
                'EventHostName' => 'Name',
                'EventLocation' => 'Location',
            ];

            $modelGridField = GridField::create(
                'EventHost',
                'Host',
                EventHost::get(),
                $modelGridFieldConfig
            );
        } elseif ($this->modelClass === EventType::class) {
            $summaryFields = [
                'EventTypeName' => 'Type',
            ];

            $modelGridField = GridField::create(
                'EventType',
                'Type',
                EventType::get(),
                $modelGridFieldConfig
            );
        } elseif ($this->modelClass === EventLocation::class) {
            $summaryFields = [
                'Title' => 'Title',
                'Address' => 'Address',
            ];

            $modelGridField = GridField::create(
                'EventLocation',
                'Location',
                EventLocation::get(),
                $modelGridFieldConfig
            );
        }

        $dataColumns = $modelGridFieldConfig->getComponentByType(GridFieldDataColumns::class);
        $dataColumns->setDisplayFields($summaryFields);
        $modelFields = FieldList::create($modelGridField);

        $form->setFields($modelFields);

        return $form;
    }

}
