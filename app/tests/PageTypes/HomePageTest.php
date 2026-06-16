<?php

namespace App\Tests\PageTypes;

use App\PageTypes\HomePage;
use SilverStripe\Dev\FunctionalTest;

class HomePageTest extends FunctionalTest
{
    protected static $fixture_file = 'app/tests/fixtures/HomePageTest.yml';

    public function testHomePageConfiguration()
    {
        $page = $this->objFromFixture(HomePage::class, 'home');

        $this->assertEquals('Home', $page->Title);
    }

    public function testGetCMSFieldsRemovesContent()
    {
        $page = new HomePage();
        $fields = $page->getCMSFields();

        $this->assertNull($fields->dataFieldByName('Content'), 'Content field should be removed from HomePage');
    }
}