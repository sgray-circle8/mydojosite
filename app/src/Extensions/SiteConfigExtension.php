<?php

namespace App\Extensions;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;

class SiteConfigExtension extends Extension
{

    private static array $has_one = [
        'HeaderLogo' => Image::class,
    ];

    private static array $owns = [
        'HeaderLogo',
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        // Header Logo
        $fields->addFieldsToTab(
            'Root.Main',
            [
                UploadField::create(
                    'HeaderLogo',
                    'Header Logo'
                ),
            ],
        );
    }
}
