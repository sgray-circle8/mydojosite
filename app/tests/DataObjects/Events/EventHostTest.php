<?php

namespace App\Tests\DataObjects;

use App\DataObjects\Events\EventHost;
use SilverStripe\Dev\SapphireTest;

class EventHostTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/EventHostTest.yml';

    public function testHostFields()
    {
        $host = $this->objFromFixture(EventHost::class, 'main_host');

        $this->assertEquals('Community Center', $host->EventHostName);
        $this->assertEquals('Wellington', $host->EventLocation);
        $this->assertEquals('https://wellington.example.com', $host->EventHostURL);
    }
}