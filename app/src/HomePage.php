<?php

namespace {

    use SilverStripe\Forms\TextareaField;

    class HomePage extends Page
    {
        private static $db = [
            'Schedule' => 'Text',
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldToTab(
                'Root.Main',
                TextareaField::create(
                    'Schedule', 'Schedule'
                ),
                'Content'
            );

            $fields->removeByName([
                'Content',
            ]);

            return $fields;
        }
    }
}

