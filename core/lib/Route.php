<?php 
namespace core\lib;

use core\lib\Config as Config;
/**
* 
*/
class Route
{
	public $ctrl;
	public $action;

	function __construct(){
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/') {

			$path = $_SERVER['REQUEST_URI'];
			$patharr = explode('/', trim($path,'/'));
			if (isset($patharr[0])) {
				$this->ctrl = $patharr[0];
			}
			unset($patharr[0]);
			if (isset($patharr[1])) {
				$this->action = $patharr[1];
				unset($patharr[1]);
			}else{
				$this->action = Config::get('ACTION','route');
			}

			//拆分GET参数
			$count = count($patharr);
			$i = 2;
			while ( $i <= $count) {
				$_GET[$patharr[$i]] = $patharr[$i+1];
				$i=$i+2;
			}

		}else{
			$this->ctrl = Config::get('CTRL','route');
			$this->action = Config::get('ACTION','route');

		}
	}

}