<?php
/*
 */
namespace {

    use App\DataObjects\Testimonial;
    use SilverStripe\ORM\DataList;


    class TestimonialsPage extends Page
    {
        private static $db = [];

        private static $has_one = [];

        private static $has_many = [
            'Testimonials' => Testimonial::class
        ];

        public function Testimonials(): DataList
        {
            return Testimonial::get();
        }
    }

}

