<?php

namespace App\PageTypes;

use Page;

class HomePage extends Page
{

    private static string $table_name = 'HomePage';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'Content',
        ]);

        return $fields;
    }

}
