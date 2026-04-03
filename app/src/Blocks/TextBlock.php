<?php

namespace App\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\CMS\Model\SiteTree;
use Silverstripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;

class TextBlock extends BaseElement
{

    private static string $table_name = 'TextBlock';

    private static string $singular_name = 'Text Block';

    private static string $plural_name = 'Text Blocks';

    private static string $description = 'Text block';

    private static bool $inline_editable = false;

    private static string $icon = 'font-icon-align-justify';

    private static array $db = [
        'BackgroundColour' => 'Varchar(10)',
        'ForegroundColour' => 'Varchar(10)',
        'BlockSummary' => 'Text',
        'ButtonText' => 'Varchar(10)',
    ];

    private static array $has_one = [
        'LinkedPage' => SiteTree::class,
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'BlockSummary',
            'ButtonText',
            'LinkedPageID'
        ]);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextareaField::create('BlockSummary', 'Summary'),
                TextField::create('ButtonText', 'Button Text'),
                TreeDropdownField::create(
                    'LinkedPageID',
                    'Linked Page',
                    SiteTree::class
                )
            ]
        );

        return $fields;
    }

}
