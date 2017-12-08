<?php
/* *
 * aliphp 日志类 
 * 作  者：永乐开发 
 * 日  期：2017.9.22
 * 邮  箱：web@isu5.cn 
 * 官  网：http://www.isu5.cn  
 * 博  客：http://it.alipea.com 
 * @copyright  (C) 2015-2018 aliphp
 */ 

namespace core\lib;
use core\lib\config;


class log{

	static $class;
	/**
	* 1.log日志存储方式
	*
	* 2. 写日志
	*/
	static public function init(){
		//加载配置文件中驱动类型
		$drive = config::get('DRIVE','log');
		
		$class = '\core\lib\drive\log\\' .$drive;
	
		self::$class = new $class;
	}

	//写日志
	static public function log($name,$file = 'log'){
		//直接调用类型中的方法
		self::$class->log($name,$file);
	} 



}