<?php
namespace core\lib;

/**
* 
*/
class config
{

	public static function get($name , $file='config' ){
		$file = ROOT.'/core/config/'.$file.'.php';
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

}