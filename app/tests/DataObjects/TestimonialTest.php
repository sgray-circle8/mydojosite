<?php

namespace App\Tests\DataObjects;

use App\DataObjects\Testimonial;
use SilverStripe\Dev\SapphireTest;

class TestimonialTest extends SapphireTest
{
    protected static $fixture_file = 'app/tests/fixtures/TestimonialTest.yml';

    public function testShortTestimonialTruncation()
    {
        $testimonial = $this->objFromFixture(Testimonial::class, 'client_review');

        $this->assertNotEmpty($testimonial->getShortTestimonial());
        $this->assertLessThanOrEqual(125, strlen($testimonial->getShortTestimonial()));
    }
}