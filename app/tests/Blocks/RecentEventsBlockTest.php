<?php

namespace App\Tests\Blocks;

use App\Blocks\RecentEventsBlock;
use SilverStripe\Dev\SapphireTest;

class RecentEventsBlockTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/RecentEventsBlockTest.yml';

    public function testRecentEventsReturnsSortedLimit()
    {
        $block = $this->objFromFixture(RecentEventsBlock::class, 'block1');
        $events = $block->RecentEvents();

        $this->assertEquals(4, $events->count());
        $this->assertEquals('Newest', $events->first()->Title);
        $this->assertEquals('Recent 1', $events->last()->Title);
    }

    public function testLinkedPageURL()
    {
        $block = $this->objFromFixture(RecentEventsBlock::class, 'block1');

        $this->assertEquals('events-listing', $block->LinkedPageURL());
    }
}