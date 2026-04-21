<?php

namespace App\DataObjects;

use SilverStripe\Admin\ModelAdmin;

class QuoteAdmin extends ModelAdmin
{
    private static string $menu_title = 'Quotes';

    private static string $url_segment = 'quote-admin';

    private static float $menu_priority = -0.20;

    private static array $managed_models = [
        Quote::class,
    ];

}