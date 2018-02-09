<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 2018/2/9
 * Time: 11:16
 */

namespace Aliyun\Core;

use Aliyun\Core\Profile\DefaultProfile;

class Client
{
    public static function init($accessKeyId, $accessKeySecret, $region, $options = [])
    {
        // 加载区域结点配置
        Autoload::config();

        // 初始化acsClient,暂不支持region化
        $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);

        if ($options) {
            // 服务结点
            $endPointName = $options['endPointName'];
            //产品名称:云通信流量服务API产品,开发者无需替换
            $product = $options['product'];
            //产品域名,开发者无需替换
            $domain = $options['domain'];
            // 增加服务结点
            DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);
        }

        // 初始化AcsClient用于发起请求
        $client = new DefaultAcsClient($profile);
        return $client;
    }
}