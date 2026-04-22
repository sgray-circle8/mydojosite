<?php

namespace App\PageTypes;

use App\DataObjects\Testimonial;
use Page;
use SilverStripe\ORM\DataList;

class TestimonialsPage extends Page
{

    private static string $table_name = 'TestimonialsPage';

    private static array $db = [];

    private static array $has_one = [];

    private static array $has_many = [
        'Testimonials' => Testimonial::class
    ];

    public function Testimonials(): DataList
    {
        return Testimonial::get();
    }

}
