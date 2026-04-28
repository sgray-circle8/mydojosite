<?php

namespace App\DataObjects\Events;

use SilverStripe\ORM\DataObject;

class EventHost extends DataObject
{

    private static string $table_name = 'EventHost';

    private static string $singular_name = 'Host';

    private static array $db = [
        'EventHostName' => 'Varchar',
        'EventLocation' => 'Varchar',
        'EventHostURL' => 'Varchar',
    ];
}
