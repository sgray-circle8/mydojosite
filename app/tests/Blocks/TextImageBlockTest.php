<?php

namespace App\Tests\Blocks;

use App\Blocks\TextImageBlock;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class TextImageBlockTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/TextImageBlockTest.yml';

    public function testFieldsAndConfiguration()
    {
        $block = $this->objFromFixture(TextImageBlock::class, 'text_image_block');

        $this->assertEquals('Our Process', $block->SubTitle);
        $this->assertEquals('Light Grey', $block->BGColour);
        $this->assertEquals('Right', $block->ImageAlignment);
    }

    public function testGetCMSFields()
    {
        $block = new TextImageBlock();
        $fields = $block->getCMSFields();

        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('SubTitle'));
        $this->assertNotNull($fields->dataFieldByName('BGColour'));
        $this->assertNotNull($fields->dataFieldByName('ImageAlignment'));
        $this->assertNotNull($fields->dataFieldByName('Image1'));
        $this->assertNotNull($fields->dataFieldByName('Image2'));
    }
}