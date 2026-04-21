<?php

namespace App\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class SiteConfigExtension extends Extension
{

    private static array $db = [
        'DojoName' => 'Varchar(255)',
        'DojoAddress' => 'Varchar(255)',
        'ContactEmail' => 'Varchar(255)',
        'FacebookLink' => 'Varchar(255)',
        'TrainingSchedule' => 'Text',
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextField::create(
                    'DojoName',
                    'Dojo Name'
                ),
                TextField::create(
                    'DojoAddress',
                    'Dojo Address'
                ),
                TextField::create(
                    'ContactEmail',
                    'Contact Email'
                ),
                TextField::create(
                    'FacebookLink',
                    'Facebook Link'
                ),
                TextareaField::create(
                    'TrainingSchedule',
                    'Training Schedule'
                ),
            ],
        );
    }
}
