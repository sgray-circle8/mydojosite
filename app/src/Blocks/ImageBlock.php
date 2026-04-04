<?php

namespace App\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\DropdownField;
use Silverstripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;

class ImageBlock extends BaseElement
{

    private static string $table_name = 'ImageBlock';

    private static string $singular_name = 'Image Block';

    private static string $plural_name = 'Image Blocks';

    private static string $description = 'Image block';

    private static bool $inline_editable = false;

    private static string $icon = 'font-icon-image';

    private static array $db = [
        'Size' => 'Enum("1-Col, 2-Col", "1-Col")',
    ];

    private static array $has_one = [
        'BlockImage' => Image::class,
    ];

    private static array $owns = [
        'BlockImage',
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'BlockImageID',
        ]);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                DropdownField::create(
                    'Size',
                    'Columns',
                    $this->dbObject('Size')->enumValues(),
                ),
                UploadField::create('BlockImage', 'Image'),
            ]
        );

        return $fields;
    }

}
