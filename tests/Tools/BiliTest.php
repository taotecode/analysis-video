<?php

namespace yuanzhumc\Tests\Tools;

use PHPUnit\Framework\TestCase;
use yuanzhumc\analysisVideo\Enumerates\BiliQualityType;
use yuanzhumc\analysisVideo\VideoManager;

class BiliTest extends TestCase
{

    public function testStart()
    {
        $res = VideoManager::Bili()->setUrl("https://b23.tv/av84665662")->setQuality(BiliQualityType::LEVEL_2)->execution();
        var_dump($res);
    }
}
