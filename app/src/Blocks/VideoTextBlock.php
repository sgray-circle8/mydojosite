<?php

namespace App\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;

class VideoTextBlock extends BaseElement
{
    private static string $table_name = 'VideoTextBlock';
    private static string $singular_name = 'Video Text Block';
    private static string $plural_name = 'Video Text Blocks';
    private static bool $inline_editable = false;
    private static string $icon = 'font-icon-block-media';

    private static array $db = [
        'BGColour' => 'Enum("White, Light Grey, Dark Grey, Red", "Light Grey")',
        'VideoURL' => 'Varchar(255)',
        'BlockText' => 'HTMLText',
        'VideoAlignment'=> 'Enum(array("Left", "Right"), "Right")',
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            DropdownField::create(
                'BGColour',
                'Background Colour',
                $this->dbObject('BGColour')->enumValues()
            ),
            DropdownField::create(
                'VideoAlignment',
                'Video Alignment',
                $this->dbObject('VideoAlignment')->enumValues()
            ),
            TextField::create(
                'VideoURL',
                'Video URL'
            )->setDescription('<strong>Required:</strong>A YouTube or Vimeo link'),
            HTMLEditorField::create(
                'BlockText',
                'Video Text'
            )->setDescription('Recommended max length: 590 - 600 characters'),
        ]);

        return $fields;
    }

    /**
     * @return string
     */
    public function getEmbedURL(): string
    {
        $url = $this->VideoURL;

        // Handle YouTube
        if (preg_match(
            '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
            $url,
            $match)
        ) {
            return 'https://www.youtube.com/embed/' . $match[1] . '?rel=0';
        }

        // Handle Vimeo
        if (preg_match('/vimeo\.com\/(\d+)/', $url, $match)) {
            return 'https://player.vimeo.com/video/' . $match[1];
        }

        return $url;
    }
}