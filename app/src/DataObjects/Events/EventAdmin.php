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

}
