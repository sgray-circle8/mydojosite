<?php
namespace {

    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\Forms\TextField;

    class ContactPage extends Page
    {
        private static array $db = [
            'InfoBlockTitle' => 'Varchar',
            'InfoBlockContent' => 'HTMLText',
            'ThankYouMessage' => 'Varchar',
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->removeByName([
                'Content',
            ]);

            $fields->addFieldsToTab(
              'Root.Main',
              [
                  TextField::create('InfoBlockTitle', 'Title'),
                  HTMLEditorField::create('InfoBlockContent', 'Content'),
                  TextField::create(
                      'ThankYouMessage',
                      'Message'
                  )->setDescription('Thank-you message shown after form is submitted.'),
              ]
            );

            return $fields;
        }
    }

}