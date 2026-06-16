<?php

namespace App\Tests\PageTypes;

use App\PageTypes\TestimonialsPage;
use SilverStripe\Dev\FunctionalTest;

class TestimonialsPageTest extends FunctionalTest
{
    protected static $fixture_file = 'app/tests/fixtures/TestimonialsPageTest.yml';

    public function testTestimonialsMethod()
    {
        $page = $this->objFromFixture(TestimonialsPage::class, 'testimonials_page');
        $testimonials = $page->Testimonials();

        $this->assertEquals(2, $testimonials->count(), 'Should retrieve all testimonials');
        $this->assertEquals('Alice', $testimonials->first()->Name);
    }
}