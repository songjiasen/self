<?php

namespace core\lib;

use PDO;
use core\lib\Config as Config;

/**
* 持久化连接
*/
class Model
{
	protected $pdo;
	protected $table;
	public function __construct()
	{
		$host     = Config::get('HOST','database');
		$db_name  = Config::get('DB_NAME','database');
		$username = Config::get('USERNAME','database');
		$password = Config::get('PASSWORD','database');
		$dsn = 'mysql:host='.$host.';dbname='.$db_name.'';
		try {
			$this->pdo   = new PDO($dsn,$username,$password);
		} catch (\PDOException $e) {
			p($e->getMessage());
		}
	}

	public function table($table){
		$this->table = $table;
		return $this;
	}

	public function get(){
		$sql = "SELECT * FROM ".$this->table;
		$data = $this->pdo->query($sql);
		return $data->fetchAll();
	}

}