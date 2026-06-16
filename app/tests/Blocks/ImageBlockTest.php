<?php

namespace App\Tests\Blocks;

use App\Blocks\ImageBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class ImageBlockTest extends SapphireTest
{
    public function testGetCMSFields()
    {
        $block = new ImageBlock();
        $fields = $block->getCMSFields();

        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Size'));
        $this->assertNotNull($fields->dataFieldByName('BlockImage'));
    }
}