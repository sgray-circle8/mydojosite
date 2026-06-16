<?php

namespace App\Tests\DataObjects;

use App\DataObjects\Quote;
use SilverStripe\Dev\SapphireTest;

class QuoteTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/QuoteTest.yml';

    public function testGetShortQuote()
    {
        $quote = $this->objFromFixture(Quote::class, 'quote');

        $this->assertLessThanOrEqual(125, strlen($quote->getShortQuote()));
    }
}