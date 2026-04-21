<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;

    class Page extends SiteTree
    {
        private static array $db = [];

        private static array $has_one = [];

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
