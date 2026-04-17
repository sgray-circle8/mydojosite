<?php

namespace App\DataObjects\Events;

use SilverStripe\ORM\DataObject;

class EventParticipantDojo extends DataObject
{

    private static string $table_name = 'EventParticipantDojo';

    private static string $singular_name = 'Dojo';

    private static array $db = [
        'DojoName' => 'Varchar',
        'DojoLocation' => 'Varchar',
    ];
}
