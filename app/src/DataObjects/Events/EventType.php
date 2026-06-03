<?php

namespace App\DataObjects\Events;

use SilverStripe\ORM\DataObject;

class EventType extends DataObject
{

    private static string $table_name = 'EventType';

    private static array $db = [
        'EventTypeName' => "Varchar(50)",
    ];

    private static array $summary_fields = [
        'EventTypeName' => 'Type',
    ];
}
