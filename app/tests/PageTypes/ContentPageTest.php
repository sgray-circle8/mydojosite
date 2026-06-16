<?php

namespace App\Tests\PageTypes;

use App\PageTypes\ContentPage;
use SilverStripe\Dev\FunctionalTest;

class ContentPageTest extends FunctionalTest
{
    protected static $fixture_file = 'app/tests/fixtures/ContentPageTest.yml';

    public function testContentPageRenders()
    {
        $page = $this->objFromFixture(ContentPage::class, 'basic_content_page');

        $page->publishRecursive();

        $this->assertEquals('about-us', $page->URLSegment);
        $response = $this->get($page->URLSegment);
        $this->assertEquals(200, $response->getStatusCode());
    }
}