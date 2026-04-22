<?php

namespace App\PageTypes;

use SilverStripe\CMS\Controllers\ContentController;

class ContentPageController extends ContentController
{

    private static array $allowed_actions = [];

    protected function init()
    {
        parent::init();
    }

}
