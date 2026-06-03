<?php

namespace App\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\CMS\Model\SiteTree;
use Silverstripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;

class CTABlockFullWidth extends BaseElement
{

    private static string $table_name = 'CTABlockFW';

    private static string $singular_name = 'CTA Block (Full Width)';

    private static string $plural_name = 'CTA Blocks (Full Width)';

    private static string $description = 'Full-width CTA block';

    private static bool $inline_editable = false;

    private static string $icon = 'font-icon-attention-1';

    private static array $db = [
        'CTASummary' => 'HTMLText',
        'CTAButtonText' => 'Varchar(60)',
        ];

    private static array $has_one = [
        'CTAButtonPage' => SiteTree::class,
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'CTASummary',
            'CTAButtonText',
            'CTAButtonPageID'
        ]);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                HTMLEditorField::create('CTASummary', 'Summary'),
                TextField::create(
                    'CTAButtonText',
                    'Button Text'
                )->setTargetLength(35,15,36),
                TreeDropdownField::create(
                    'CTAButtonPageID',
                    'Button Link',
                    SiteTree::class
                )
            ]
        );

        return $fields;
    }

}
