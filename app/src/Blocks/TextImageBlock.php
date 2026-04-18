<?php

namespace App\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use Silverstripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class TextImageBlock extends BaseElement
{

    private static string $table_name = 'TextImageBlock';

    private static string $singular_name = 'Text Image Block';

    private static string $plural_name = 'Text Image Blocks';

    private static string $description = 'Text image block';

    private static bool $inline_editable = false;

    private static string $icon = 'font-icon-block-story';

    private static array $db = [
        'SubTitle' => 'Varchar',
        'BGColour' => 'Enum("White, Light Grey, Dark Grey, Red", "Light Grey")',
        'BlockText' => 'HTMLText',
        'Image1Caption' => 'Text',
        'Image2Caption' => 'Text',
        'ImageAlignment' => 'Enum(array("Left", "Right"), "Left")',
    ];

    private static array $has_one = [
        'Image1' => Image::class,
        'Image2' => Image::class,
    ];

    private static array $owns = [
      'Image1',
      'Image2',
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'BlockText',
            'Image1ID',
            'Image2ID',
        ]);

        $fieldSubTitle = TextField::create('SubTitle','Subtitle');
        $fields->addFieldToTab('Root.Main', $fieldSubTitle)
            ->insertAfter('Title', $fieldSubTitle);

        $fieldBGColour = DropdownField::create('BGColour','Background Colour',
            $this->dbObject('BGColour')->enumValues(),
        );
        $fields->addFieldToTab('Root.Main', $fieldBGColour)
            ->insertAfter('SubTitle', $fieldBGColour);

        $fieldImageAlignment = DropdownField::create('ImageAlignment','Image Alignment',
            $this->dbObject('ImageAlignment')->enumValues(),
        );
        $fields->addFieldToTab('Root.Main', $fieldImageAlignment)
            ->insertAfter('BGColour', $fieldImageAlignment);

        $fieldImage1 = UploadField::create('Image1','Image 1');
        $fields->addFieldToTab('Root.Main', $fieldImage1)
            ->insertAfter('ImageAlignment', $fieldImage1);

        $fieldImage1Caption = TextField::create('Image1Caption','Image 1 Caption');
        $fields->addFieldToTab('Root.Main', $fieldImage1Caption)
            ->insertAfter('Image1', $fieldImage1Caption);

        $fieldImage2 = UploadField::create('Image2','Image 2')->setDescription('Optional');
        $fields->addFieldToTab('Root.Main', $fieldImage2)
            ->insertAfter('Image1Caption', $fieldImage2);

        $fieldImage2Caption = TextField::create(
            'Image2Caption',
            'Image 2 Caption'
        )->setDescription('Optional');
        $fields->addFieldToTab('Root.Main', $fieldImage2Caption)
            ->insertAfter('Image2', $fieldImage2Caption);

        return $fields;
    }

}
