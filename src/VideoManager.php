<?php
declare (strict_types=1);

namespace yuanzhumc\analysisVideo;

use yuanzhumc\analysisVideo\Exception\InvalidManagerException;
use yuanzhumc\analysisVideo\Interfaces\IVideo;
use yuanzhumc\analysisVideo\Tools\Bili;
use yuanzhumc\analysisVideo\Tools\DouYin;
use yuanzhumc\analysisVideo\Tools\HuoShan;
use yuanzhumc\analysisVideo\Tools\KuaiShou;
use yuanzhumc\analysisVideo\Tools\LiVideo;
use yuanzhumc\analysisVideo\Tools\MeiPai;
use yuanzhumc\analysisVideo\Tools\MiaoPai;
use yuanzhumc\analysisVideo\Tools\MoMo;
use yuanzhumc\analysisVideo\Tools\PiPiGaoXiao;
use yuanzhumc\analysisVideo\Tools\PiPiXia;
use yuanzhumc\analysisVideo\Tools\QQVideo;
use yuanzhumc\analysisVideo\Tools\QuanMingGaoXiao;
use yuanzhumc\analysisVideo\Tools\ShuaBao;
use yuanzhumc\analysisVideo\Tools\TaoBao;
use yuanzhumc\analysisVideo\Tools\TouTiao;
use yuanzhumc\analysisVideo\Tools\WeiBo;
use yuanzhumc\analysisVideo\Tools\WeiShi;
use yuanzhumc\analysisVideo\Tools\XiaoKaXiu;
use yuanzhumc\analysisVideo\Tools\XiGua;
use yuanzhumc\analysisVideo\Tools\ZuiYou;

/**
 * Created By 1
 * Author：smalls
 * Email：smalls0098@gmail.com
 * Date：2020/4/26 - 21:51
 **/

/**
 * @method static HuoShan HuoShan(...$params)
 * @method static DouYin DouYin(...$params)
 * @method static KuaiShou KuaiShou(...$params)
 * @method static TouTiao TouTiao(...$params)
 * @method static XiGua XiGua(...$params)
 * @method static WeiShi WeiShi(...$params)
 * @method static PiPiXia PiPiXia(...$params)
 * @method static ZuiYou ZuiYou(...$params)
 * @method static MeiPai MeiPai(...$params)
 * @method static LiVideo LiVideo(...$params)
 * @method static QuanMingGaoXiao QuanMingGaoXiao(...$params)
 * @method static PiPiGaoXiao PiPiGaoXiao(...$params)
 * @method static MoMo MoMo(...$params)
 * @method static ShuaBao ShuaBao(...$params)
 * @method static XiaoKaXiu XiaoKaXiu(...$params)
 * @method static Bili Bili(...$params)
 * @method static WeiBo WeiBo(...$params)
 * @method static MiaoPai MiaoPai(...$params)
 * @method static QQVideo QQVideo(...$params)
 * @method static TaoBao TaoBao(...$params)
 */
class VideoManager
{

    public function __construct()
    {
    }

    /**
     * @param $method
     * @param $params
     * @return mixed
     */
    public static function __callStatic($method, $params)
    {
        $app = new self();
        return $app->create($method, $params);
    }

    /**
     * @param string $method
     * @param array $params
     * @return mixed
     * @throws InvalidManagerException
     */
    private function create(string $method, array $params)
    {
        $className = __NAMESPACE__ . '\\Tools\\' . $method;
        if (!class_exists($className)) {
            throw new InvalidManagerException("the method name does not exist . method : {$method}");
        }
        return $this->make($className, $params);
    }

    /**
     * @param string $className
     * @param array $params
     * @return mixed
     * @throws InvalidManagerException
     */
    private function make(string $className, array $params)
    {
        $app = new $className($params);
        if ($app instanceof IVideo) {
            return $app;
        }
        throw new InvalidManagerException("this method does not integrate IVideo . namespace : {$className}");
    }
}