<?php
/**
* 
*/
namespace app\ctrl;
use core\lib\model;
use core\lib\config;
use Medoo\Medoo;

class indexCtrl extends \core\kernel
{
	
	function __construct()
	{
		// p('来了');
	}

	public function index(){

		p('123');
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
		$data = $model->table('tag')->get();
		p($data);

	}

	public function medoo(){
		$database = new Medoo([
		    'database_type' => 'mysql',
		    'database_name' => 'blog',
		    'server' => 'localhost',
		    'username' => 'root',
		    'password' => 'root'
		]);
		$data = $database->select('user', [
		    'username'
		]);
		p($data);
	}
}