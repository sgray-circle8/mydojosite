<?php

namespace App\DataObjects;

use SilverStripe\Admin\ModelAdmin;

class TestimonialAdmin extends ModelAdmin
{
    private static string $menu_title = 'Testimonials';

    private static string $url_segment = 'testimonial-admin';

    private static float $menu_priority = -0.20;

    private static array $managed_models = [
        Testimonial::class,
    ];

}