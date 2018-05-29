<?php

namespace core;

/**
* 
*/
class kernel
{
	public $assign;
	public static function run(){
		$route = new \core\lib\route();
		$ctrlName   = $route->ctrl;
		$actionName = $route->action;
		$ctrlFile   = APP.'/ctrl/'.$ctrlName.'Ctrl.php';
		$ctrlClass  = '\\'.MOUDLE.'\ctrl\\'.$ctrlName.'Ctrl';
		if (is_file($ctrlFile)) {
			include $ctrlFile;
			$ctrl = new $ctrlClass;
			$ctrl->$actionName();
		}else{
			throw new Exception("找不到".$ctrlFile, 1);
		}
	}

	public static function load($class){
		$class = str_replace('\\', '/', $class);
		$file = ROOT.'/'.$class.'.php';
		if (is_file($file)) {
			include $file;
		}else{
			return false;
		}
	}

	public function assign($name , $value){
		$this->assign[$name] = $value;
	}

	public function display($file){
		$file = APP.'/views/'.$file;
		extract($this->assign);
		if (is_file($file)) {
			include $file;
		}
	}
}