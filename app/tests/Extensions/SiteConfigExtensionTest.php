<?php

namespace App\Tests\Extensions;

use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Dev\SapphireTest;

class SiteConfigExtensionTest extends SapphireTest
{

    protected static $required_extensions = [
        SiteConfig::class => ['App\Extensions\SiteConfigExtension'],
    ];

    public function testUpdateCMSFieldsAddsFields()
    {
        $siteConfig = SiteConfig::current_site_config();
        $fields = $siteConfig->getCMSFields();

        $this->assertNotNull($fields->dataFieldByName('DojoName'), 'DojoName field should exist');
        $this->assertNotNull($fields->dataFieldByName('DojoAddress'), 'DojoAddress field should exist');
        $this->assertNotNull($fields->dataFieldByName('ContactEmail'), 'ContactEmail field should exist');
        $this->assertNotNull($fields->dataFieldByName('FacebookLink'), 'FacebookLink field should exist');
        $this->assertNotNull($fields->dataFieldByName('TrainingSchedule'), 'TrainingSchedule field should exist');
    }
}