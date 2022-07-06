<h1>
analysisVideo<br>
<small>短视频去水印</small>
</h1>
<p>
<a href="https://packagist.org/packages/yuanzhumc/analysis-video"><img src="https://poser.pugx.org/yuanzhumc/analysis-video/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/yuanzhumc/analysis-video"><img src="https://poser.pugx.org/yuanzhumc/analysis-video/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/yuanzhumc/analysis-video"><img src="https://poser.pugx.org/yuanzhumc/analysis-video/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/yuanzhumc/analysis-video"><img src="https://poser.pugx.org/yuanzhumc/analysis-video/license" alt="License"></a>
</p>



## 短视频去水印
集成了：抖音、火山、头条、快手、梨视频、美拍、陌陌、皮皮搞笑、皮皮虾、全民搞笑、刷宝、微视、小咖秀、最右、B站、微博、秒拍、淘宝等等。其他如果需要对接的可以issues

* 我们已经对接了21个平台的视频提取（部分视频是有水印的，没办法做到无水印）

## 项目正在开发中，1.0.0版为原作者最后发布版本
有能力的小伙伴可以参与PR一起开发

## 安装

> 运行环境要求PHP7.3+

#### 安装方法一：（需要下载composer.phar到根目录，设置PHP为全局变量）
```php
php composerphar require yuanzhumc/analysis-video
```
#### 安装方法二：
```php
composer require yuanzhumc/analysis-video
```

#### 如果需要更新扩展包使用
```php
composer update yuanzhumc/analysis-video
```

********
 
 VideoManager使用文档：(可以参考tests/testphp)
 ==
    抖音：VideoManager::DouYin()->start($url);
    快手：VideoManager::KuaiShou()->start($url);
    火山：VideoManager::HuoShan()->start($url);
    头条：VideoManager::TouTiao()->start($url);
    快手：VideoManager::XiGua()->start($url);
    快手：VideoManager::WeiShi()->start($url);
    皮皮虾：VideoManager::PiPiXia()->start($url);
    最右：VideoManager::ZuiYou()->start($url);
    美拍：VideoManager::MeiPai()->start($url);
    梨视频：VideoManager::LiVideo()->start($url);
    全民搞笑：VideoManager::QuanMingGaoXiao()->start($url);
    皮皮搞笑：VideoManager::PiPiGaoXiao()->start($url);
    陌陌：VideoManager::MoMo()->start($url);
    刷宝：VideoManager::ShuaBao()->start($url);
    小咖秀：VideoManager::XiaoKaXiu()->start($url);
    B站：VideoManager::Bili()->start($url);
    微博：VideoManager::WeiBo()->start($url);
    微博短视频：VideoManager::WeiBo()->newVideoStart($url);
    秒拍：VideoManager::MiaoPai()->start($url);
    B站指定参数：VideoManager::Bili()->setUrl($url)->setQuality(BiliQualityType::LEVEL_2)->execution();
    腾讯视频短视频：VideoManager::QQVideo()->start($url);
    淘宝：VideoManager::TaoBao()->start($url);
   自定义URL配置文件：url-validator
   --
   ````
    例如抖音：$res = VideoManager::KuaiShou([
              'proxy_whitelist' => ['kuaishou'],//白名单，需要提交类名，全部小写
              'proxy' => '$ip:$port',
              'url_validator' => [
                    这边参考config/url-validator.php
              ]
          ])->start($url);
    可以参考config/url-validator.php的格式用参数传递，如果不指定则使用默认的
    不会怎么编写全部使用默认也是可以的
   ````
   返回成功：array
   --
   ````
    array(8) {
       ["md5"]=>
       string(32) "fb0f49b1158923a972d9eed40f97965e"
       ["message"]=>
       string(29) "https://v.kuaishou.com/xxxx"
       ["user_name"]=>
       string(15) "xxxx"
       ["user_head_img"]=>
       string(103) "https://tx2.a.yximgs.com/uhead/AB/2020/04/20/14/xxxxx.jpg"
       ["desc"]=>
       string(46) "小子，xxxxx"
       ["img_url"]=>
       string(139) "https://js2.a.yximgs.com/xxxxx.jpg"
       ["video_url"]=>
       string(144) "https://jsmov2.a.yximgs.com/xxxxx.mp4"
       ["type"]=>
       string(5) "video"
    }
   ````
   返回失败：exception
   --
   ````
       需要进行try-catch
       namespace \yuanzhumc\analysisVideo\Exception;
       try {
           $res = VideoManager::KuaiShou()->start("https://v.kuaishou.com/xxxx");
       } catch (ErrorVideoException $e) {
           $e->getTraceAsString();
       }
   ````
  ********
结束：  
==
  <font>注：仅供学习,切勿用于其他用途，由使用人自行承担因此引发的一切法律责任，作者不承担法律责任。</font> <br>
  **喜欢的话，给个star呗**<br>
  **喜欢的话，给个star呗**<br>
  **喜欢的话，给个star呗**<br>
  
  自己可以参考tests/test.php<br>
  都无法使用再提issue

更新日志：
==
* 2022-07-06：项目由MIT协议转于此，并保留原作者开发信息，此项目继用MIT开源协议，将继续进行开发
* 2021-11-01:原作者最后更新时间
* 2020-10-25：更新梨视频提取不了，视频有问题可以发邮箱联系我
* 2020-08-16：添加淘宝提取视频
* 2020-08-16：近期版本更新：去除快手APP去水印，引入旧版的H5，如果想要高性能可以自己对接代理然后进行提取链接，其他继续稳定，不懂的话看一下我的博客有教程
* 2020-07-17：更新快速提取无水印视频、添加腾讯视频短视频提取视频
* 2020-06-24：更新抖音提取视频
* 2020-06-14：添加秒拍提取视频，修复美拍提取视频失败
* 2020-06-13：添加微博提取视频（远古视频有水印）
* 2020-06-10：新加代理功能，有点不稳定，有什么好的建议可以issues给我
* 2020-06-10：添加url-validator配置类
* 2020-06-09：全部优化了一下更加面向对象，新加B站解析视频
* 2020-04-29：第一个版本


赞助：  
==
* 感谢 [5ime/video_spider](https://github.com/5ime/video_spider/) 提供的代码
* 感谢原作者提出的基础逻辑结构[smalls0098/video-parse-tools](https://github.com/smalls0098/video-parse-tools)|作者博客：[www.smalls.vip](http://www.smalls.vip/)
* 感谢JetBrains的支持，推荐大家使用IDE：[PHPSOTRM](https://www.jetbrains.com/?from=video-tools)
