<?php
/* 
 * aliphp 核心类 
 * 作  者：永乐开发 
 * 日  期：2017.9.21
 * 邮  箱：web@isu5.cn 
 * 官  网：http://www.isu5.cn  
 * 博  客：http://it.alipea.com 
 * @copyright  (C) 2015-2018 aliphp
 */ 
namespace core\lib;
use core\lib\config;

class route{

	public $controller;  //控制器属性
	public $action; //方法属性

	public function __construct(){
		
		/**
		* 1.隐藏index.php
		* 2.获取url 参数部分
		* 3.返回控制器和方法
		*/
		//p($_SERVER);
		$path = $_SERVER['PATH_INFO'];  //当前url

		if(isset($path) && $path != '/'){
			$patharr = explode('/', trim($path,'/'));
			if (isset($patharr[0])) {
				//控制器
				$this->controller = $patharr[0];
				unset($patharr[0]);
			}
			if (isset($patharr[1])) {
				//方法
				$this->action = $patharr[1];
				unset($patharr[1]);
			}else{
				$this->action = config::get('ACTION','route');
			}

			//url多余部分 换成 get参数
			/**
			*  原有 index/index/id/3/test/5  换成 id/3/test/5
			*/
			$count = count($patharr); //获取有多少个数组

			$i = 2;
			while ($i <= $count) {

				if(isset($patharr[$i+1])){

					$_GET[$patharr[$i]] = $patharr[$i+1];
				}

				$i = $i + 2;
			}

			//p($_GET);
		}else{
			$this->controller = config::get('CONTROLLER','route');
			$this->action = config::get('ACTION','route');
		}
	}
}