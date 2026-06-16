<?php

namespace App\Tests\Blocks;

use App\Blocks\CTABlockFullWidth;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class CTABlockFullWidthTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/CTABlockFullWidthTest.yml';

    public function testBlockFieldsAndRelationship()
    {
        $block = $this->objFromFixture(CTABlockFullWidth::class, 'cta_block');

        $this->assertEquals('Click Here', $block->CTAButtonText);
        $this->assertStringContainsString('services', $block->CTASummary);
        $this->assertEquals('Target Page', $block->CTAButtonPage()->Title);
    }

    public function testGetCMSFields()
    {
        $block = new CTABlockFullWidth();
        $fields = $block->getCMSFields();

        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('CTASummary'));
        $this->assertNotNull($fields->dataFieldByName('CTAButtonText'));
        $this->assertNotNull($fields->dataFieldByName('CTAButtonPageID'));
    }
}