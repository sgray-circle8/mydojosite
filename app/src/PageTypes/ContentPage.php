<?php

namespace App\PageTypes;

use Page;

class ContentPage extends Page
{

    private static string $table_name = 'ContentPage';

    private static array $db = [];

    private static array $has_one = [];
}

