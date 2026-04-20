<?php

namespace App\DataObjects;

use SilverStripe\ORM\DataObject;

class Testimonial extends DataObject
{
    private static string $table_name = 'Testimonial';

    private static array $db = [
        'Name' => 'Varchar(50)',
        'Location' => 'Varchar(50)',
        'Testimonial' => 'Text',
    ];
}