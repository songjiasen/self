<?php
/**
* 
*/
namespace app\ctrl;
use core\lib\model;
use core\lib\config;

class indexCtrl extends \core\kernel
{
	
	function __construct()
	{
		// p('来了');
	}

	public function index(){
		
	}

	public function view(){
		$data = 'hello world';
		$title = 'title';
		$this->assign('title',$title);
		$this->assign('data',$data);
		$this->display('index.html');
	}

	public function sql(){
		$model = new model();
		$sql = 'SELECT * FROM user';
		$data = $model->query($sql);
		p($data->fetchAll());
	}
}