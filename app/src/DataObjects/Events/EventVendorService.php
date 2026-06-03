<?php

namespace App\DataObjects\Events;

use SilverStripe\ORM\DataObject;

class EventVendorService extends DataObject
{

    private static string $table_name = 'EventVendorService';

    private static string $singular_name = 'Vendor Service';

    private static array $db = [
        'ServiceName' => 'Varchar',
    ];

    private static array $summary_fields = [
        'ServiceName' => 'Service Name',
    ];

}
