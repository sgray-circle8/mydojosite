<?php

namespace {

    class HomePage extends Page
    {

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->removeByName([
                'Content',
            ]);

            return $fields;
        }
    }
}

