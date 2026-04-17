<?php

namespace App\Blocks;

use App\DataObjects\Events\Event;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\CMS\Model\SiteTree;
use Silverstripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\ORM\DataList;

class RecentEventsBlock extends BaseElement
{

    private static string $table_name = 'RecentEventsBlock';

    private static string $singular_name = 'Recent Events Block';

    private static string $plural_name = 'Recent Events Blocks';

    private static string $description = 'Recent events block';

    private static bool $inline_editable = false;

    private static string $icon = 'font-icon-p-document';

    private static array $db = [
        'BGColour' => 'Enum("Light Grey, Dark Grey, Red", "Light Grey")',
        'ButtonText' => 'Varchar(10)',
    ];

    private static array $has_one = [
        'LinkedPage' => SiteTree::class,
    ];

    private static array $has_many = [
        'Events' => Event::class,
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'ButtonText',
            'Events',
            'LinkedPageID'
        ]);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextField::create(
                    'ButtonText',
                    'Button text'
                )->setDescription('Text to appear on button linking to the Event Listing Page'),
                TreeDropdownField::create(
                    'LinkedPageID',
                    'Event Listing Page',
                    SiteTree::class
                )
            ]
        );

        return $fields;
    }

    public function RecentEvents(): DataList
    {
        return Event::get()
            ->sort('StartDate', 'DESC')
            ->limit(4);
    }

}
