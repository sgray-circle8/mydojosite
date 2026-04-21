<?php
/*
 */
namespace {

    use App\DataObjects\Testimonial;
    use SilverStripe\ORM\DataList;


    class TestimonialsPage extends Page
    {
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

}

