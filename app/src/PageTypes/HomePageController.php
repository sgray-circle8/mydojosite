<?php

namespace App\PageTypes;

use SilverStripe\CMS\Controllers\ContentController;

class HomePageController extends ContentController
{

    private static array $allowed_actions = [];

    protected function init()
    {
        parent::init();
    }

}
