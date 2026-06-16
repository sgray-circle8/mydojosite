<?php

namespace App\Tests\Blocks;

use App\Blocks\TextBlock;
use SilverStripe\Dev\SapphireTest;

class TextBlockTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/TextBlockTest.yml';

    public function testRandomQuoteReturnsData()
    {
        $block = new TextBlock();
        $quote = $block->RandomQuote();

        $this->assertArrayHasKey('QuoteText', $quote);
        $this->assertEquals('Test quote', $quote['QuoteText']);
    }
}