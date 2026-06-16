<?php

namespace App\PageTypes;

use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\SiteConfig\SiteConfig;

class ContactPageController extends ContentController
{
    private static bool $enable_spam_protection = true;

    private static array $allowed_actions = [
        'Form',
        'submit',
        'success',
    ];

    public function Form()
    {
        $fields = FieldList::create(
            TextField::create('Name'),
            EmailField::create('Email'),
            TextareaField::create('Message')
        );

        $actions = FieldList::create(
            FormAction::create('submit', 'Engage')
        );

        $form = Form::create($this, 'Form', $fields, $actions);

        if ($this->config()->get('enable_spam_protection')) {
            $form->enableSpamProtection();
        }

        return $form;
    }

    public function submit($data, $form)
    {
        $email = Email::create();
        $email->setTo(SiteConfig::current_site_config()->ContactEmail);
        $email->setFrom(SiteConfig::current_site_config()->ContactEmail);
        $email->setReplyTo($data['Email']);
        $email->setSubject("Contact Message from {$data['Name']}");

        $messageBody = "
<p><strong>Name:</strong> {$data['Name']}</p>
<p><strong>Message:</strong> {$data['Message']}</p>
";

        $email->html($messageBody);
        $email->send();

        return $this->redirect($this->Link('success'));
    }

    public function success(): array
    {
        return [
            'IsSuccess' => true
        ];
    }
}
