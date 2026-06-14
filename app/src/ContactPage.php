<?php
/*
 */
namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\UserForms\Control\UserDefinedFormController;
    use SilverStripe\UserForms\Model\UserDefinedForm;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\View\Requirements;

    class ContactPage extends Page
    {
        private static $db = [];

        private static $has_one = [];
    }

    class ContactPageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
            Requirements::css('/_resources/themes/app/dist/css/contact-page.css');
        }

        public function ShowForm(){
            //$get = DataObject::get_by_id('UserDefinedForm',10);
            $page = UserDefinedForm::get()->filter(['URLSegment' => 'contactform'])->First();
            $form = (new UserDefinedFormController($page))->Form();
            $form->enableSpamProtection();
            return $form;
        }
    }
}

