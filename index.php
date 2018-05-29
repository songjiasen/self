<?php

//define constant
define('ROOT', realpath('./'));//根目录
define('CORE', ROOT.'/core');
define('APP', ROOT.'/app');
define('MOUDLE', 'app');

require 'vendor/autoload.php';

define('DEBUG', true);

if (DEBUG) {
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}

include CORE.'/common/function.php';

//启动框架
include CORE.'/kernel.php';

spl_autoload_register('\core\kernel::load');

\core\kernel::run();