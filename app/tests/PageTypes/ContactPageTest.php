<?php

namespace App\Tests\PageTypes;

use App\PageTypes\ContactPage;
use SilverStripe\Dev\FunctionalTest;
use SilverStripe\Forms\FieldList;

class ContactPageTest extends FunctionalTest
{
    protected static $fixture_file = 'app/tests/fixtures/ContactPageTest.yml';

    public function testContactPageFields()
    {
        $page = $this->objFromFixture(ContactPage::class, 'my_contact_page');

        $this->assertEquals('Get In Touch', $page->InfoBlockTitle);
        $this->assertEquals('Thanks for your message!', $page->ThankYouMessage);
    }

    public function testGetCMSFields()
    {
        $page = new ContactPage();
        $fields = $page->getCMSFields();

        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('InfoBlockTitle'));
        $this->assertNotNull($fields->dataFieldByName('InfoBlockContent'));
        $this->assertNotNull($fields->dataFieldByName('ThankYouMessage'));
    }
}