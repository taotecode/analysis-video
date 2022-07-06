<?php
declare (strict_types=1);

namespace yuanzhumc\analysisVideo\Tools;
/**
 * Created By 1
 * Author：smalls
 * Email：smalls0098@gmail.com
 * Date：2020/4/26 - 21:57
 **/

use yuanzhumc\analysisVideo\Interfaces\IVideo;

class MiaoPai extends Base implements IVideo
{

    /**
     * 更新时间：2020/7/31
     * @param string $url
     * @return array
     */
    public function start(string $url): array
    {
        $this->make();
        $this->logic->setOriginalUrl($url);
        $this->logic->checkUrlHasTrue();
        $this->logic->setMid();
        $this->logic->setContents();
        return $this->exportData();
    }

}