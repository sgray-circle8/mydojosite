<?php

namespace App\DataObjects;

use SilverStripe\ORM\DataObject;

class Quote extends DataObject
{
    private static string $table_name = 'Quote';

    private static array $db = [
        'QuoteText' => 'Text',
        'QuoteSource' => 'Varchar',
    ];
}