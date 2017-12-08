<?php
/**
 * 框架配置文件
 * 作  者：永乐开发 
 * 日  期：2017.9.22
 * 邮  箱：web@isu5.cn 
 * 官  网：http://www.isu5.cn  
 * 博  客：http://it.alipea.com 
 * @copyright  (C) 2015-2018 aliphp
 */ 

namespace core\lib;

class config{

	static $conf = [];
	/**
	 * $name  获取配置信息的值
	 * $file  配置文件路径
	 */
	static public function get($name,$file){
		/**
		 * 1.判断配置文件是否存在
		 * 2.判断配置是否存在
		 * 3.缓存配置
		 */
		//p(self::$conf);
		if (isset(self::$conf[$file])) {
			# code...存在配置文件直接返回当前的配置项
			return self::$conf[$file][$name];
		}else{
			
			$path = CORE . 'config' . DS . $file .'.php';
				//p($file);
			if (is_file($path)) {
				# code...
				$conf = include $path;
				if (isset($conf[$name])) {
					# code...
					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
					throw new \Exception('找不到配置项'.$name);
					
				}
			}else{
				throw new \Exception('没有找到配置文件'.$file);
				
			}
		}

		
	}

	//加载所有配置文件
	static public function all($file){
		if (isset(self::$conf[$file])) {
			# code...存在配置文件直接返回当前的配置项
			return self::$conf[$file];
		}else{
			
			$path = CORE . 'config' . DS . $file .'.php';
				//p($path);
				//dump($path);
			if (is_file($path)) {
				# code...
				$conf = include $path;
				self::$conf[$file] = $conf;
				return $conf;
			}else{
				throw new \Exception('没有找到配置文件'.$file);
				
			}
		}
	}









}