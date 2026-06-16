<?php

namespace App\Tests\Controllers;

use App\PageTypes\ContactPage;
use App\PageTypes\ContactPageController;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Validation\ValidationException;
use SilverStripe\Dev\FunctionalTest;
use SilverStripe\SiteConfig\SiteConfig;

class ContactPageControllerTest extends FunctionalTest
{
    protected static $fixture_file = 'app/tests/fixtures/ContactPageControllerTest.yml';

    /**
     * @throws ValidationException
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Disable spam protection specifically for this test run
        Config::modify()->set(
            ContactPageController::class,
            'enable_spam_protection',
            false
        );

        $config = SiteConfig::current_site_config();
        $config->ContactEmail = 'test@example.com';
        $config->write();
    }

    protected function getPublishedPage(): ContactPage
    {
        /** @var ContactPage $page */
        $page = $this->objFromFixture(
            ContactPage::class,
            'contact_page'
        );

        $page->publishRecursive();

        return $page;
    }

    public function testFormPageLoads(): void
    {
        $page = $this->getPublishedPage();

        $response = $this->get($page->Link());

        $this->assertEquals(
            200,
            $response->getStatusCode()
        );
    }

    public function testFormFieldsExist(): void
    {
        $page = $this->getPublishedPage();

        $controller = ContactPageController::create($page);
        $form = $controller->Form();

        $this->assertNotNull($form);

        $this->assertNotNull(
            $form->Fields()->dataFieldByName('Name')
        );

        $this->assertNotNull(
            $form->Fields()->dataFieldByName('Email')
        );

        $this->assertNotNull(
            $form->Fields()->dataFieldByName('Message')
        );
    }

    public function testFormSubmissionRedirectsToSuccessPage(): void
    {
        $page = $this->getPublishedPage();

        $this->get($page->Link());

        // Temporarily disable auto-following of redirects
        $this->autoFollowRedirection = false;

        $response = $this->submitForm(
            'Form_Form',
            'action_submit',
            [
                'Name' => 'John Doe',
                'Email' => 'john@example.com',
                'Message' => 'This is a test message.',
            ]
        );

        // Assert that submission triggered a 302 Redirect
        $this->assertEquals(302, $response->getStatusCode());

        // Check that the redirect targets the expected endpoint
        $this->assertStringContainsString(
            '/success',
            $response->getHeader('Location')
        );
    }

    public function testSuccessPageLoads(): void
    {
        $page = $this->getPublishedPage();

        $response = $this->get(
            $page->Link('success')
        );

        $this->assertEquals(
            200,
            $response->getStatusCode()
        );
    }
}