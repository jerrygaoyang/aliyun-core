<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 2018/2/9
 * Time: 16:29
 */

namespace Aliyun\Core;

class Autoload
{
    public static function config()
    {
        if (!defined("CORE_PATH")) {
            define("CORE_PATH", dirname(__FILE__) . '/');
        }
        include(CORE_PATH . 'Config.php');
    }
}