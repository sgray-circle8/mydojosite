<?php

namespace App\PageTypes;

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\View\Requirements;

class HomePageController extends ContentController
{

    private static array $allowed_actions = [];

    protected function init()
    {
        parent::init();
        Requirements::javascript('themes/app/dist/js/app.js');
    }

}
