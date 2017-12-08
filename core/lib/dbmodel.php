<?php
/* 
 * aliphp 数据库类 
 * 作  者：永乐开发 
 * 日  期：2017.9.21
 * 邮  箱：web@isu5.cn 
 * 官  网：http://www.isu5.cn  
 * 博  客：http://it.alipea.com 
 * @copyright  (C) 2015-2018 aliphp
 */ 
namespace core\lib;
use core\lib\config;
require 'vendor/autoload.php';
use Medoo\Medoo;
/**
* 
*/
class dbmodel extends Medoo{
	
	function __construct()
	{
		$option = config::all('database');
		
		parent::__construct($option);
	}
}

/*class dbmodel extends \PDO{

	public function __construct(){
		

		$db = config::all('database');
		//p($db);
		//连接数据库，失败则抛出异常
		try{
			parent::__construct($db['DSN'],$db['USERNAME'],$db['PASSWORD']);
		} catch(\PODException $e) {
			p($e->getMessage());
		}



	}

}*/
