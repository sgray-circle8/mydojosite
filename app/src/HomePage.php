<?php

namespace {

    use App\Blocks\TextBlock;
    use SilverStripe\Forms\TextareaField;

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

