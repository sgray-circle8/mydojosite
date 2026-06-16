<?php

namespace App\Tests\Blocks;

use App\Blocks\VideoTextBlock;
use SilverStripe\Dev\SapphireTest;

class VideoTextBlockTest extends SapphireTest
{
    public function testGetEmbedURL()
    {
        $block = new VideoTextBlock();

        $block->VideoURL = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';
        $this->assertStringContainsString('youtube.com/embed/dQw4w9WgXcQ', $block->getEmbedURL());

        $block->VideoURL = 'https://vimeo.com/123456789';
        $this->assertStringContainsString('player.vimeo.com/video/123456789', $block->getEmbedURL());
    }
}