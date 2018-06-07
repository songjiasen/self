<?php
namespace core\lib;
/**
 *
 */
class Config
{
    public static function get($name , $file='config' ){
        $file = ROOT.'/config/'.$file.'.php';
        if (is_file($file)) {
            $config = include $file;
            if (isset($config[$name])) {
                return $config[$name];
            }else{
                throw new \Exception("找不到配置项".$name, 1);
            }
        }else{
            throw new \Exception("找不到配置文件".$file, 1);
        }
    }
    public static function all($file='config'){
        $file = ROOT.'/config/'.$file.'.php';
        if (is_file($file)) {
            $config = include $file;
            return $config;
        }else{
            throw new \Exception("找不到配置文件".$file, 1);
        }
    }
}