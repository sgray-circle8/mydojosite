<?php

namespace App\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class SiteConfigExtension extends Extension
{

    private static array $db = [
        'ContactEmail' => 'Varchar(255)',
        'FacebookLink' => 'Varchar(255)',
        'ContactAddress' => 'Varchar(255)',
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextField::create(
                    'ContactEmail',
                    'Contact Email'
                ),
                TextField::create(
                    'FacebookLink',
                    'Facebook Link'
                ),
                TextField::create(
                    'ContactAddress',
                    'Contact Address'
                ),
            ],
        );
    }
}
