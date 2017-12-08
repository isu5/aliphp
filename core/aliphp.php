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
namespace core;


class aliphp{
	
	//不重复引用，定义一个静态成员属性
	public static $classMap = [];

	//
	public $assign;

	/**
	* 框架运行方法
	*/
	public static function run(){
		
		//加载日志类
		\core\lib\log::init();
		


		//加载路由
		$route = new \core\lib\route();
		//获取访问的控制器和方法
		$control = $route->controller;
		$action = $route->action;
		//控制器文件路径
		$controlPath = APP . 'controller' . DS . $control . 'Controller.php';
		//p($controlPath);die;
		//调用命名空间文件名，用来实例化类
		$controlClass = '\\' .APPNAME . '\Controller\\' . $control . 'Controller';
		//p($controlClass);die;
		
		if (is_file( $controlPath )) {
			include $controlPath;
			$ctrl = new $controlClass();
			$ctrl->$action();
			//记录日志
			\core\lib\log::log('Controller:'. $controlClass .'    ' .'action:'.$action,'route.file_log');
		}else{
			throw new \Exception("找不到控制器".$control);
			
		}



		
	
	} 
	/**
	 * //自动加载类库
	 * new \core\route();
	 * $class= '\core\route';
	 * include 'route.php';
	 */
	public static function load($class){
		
		if (isset($classMap[$class])) {
			return true;
		}else{
			$class = str_replace('\\', '/', $class);
			//p($class);
			$file = $class .'.php';
			
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
		

	}

	/**
	 * 模版输出内容
	 */
	public function assign($name,$value){
		$this->assign[$name] = $value;
	} 


	/**
	 * 加载模版文件
	 */
	public function display($file){
		$file = APP . 'views' . DS . $file;
		//p($file);
		if (is_file($file)) {
			//从数组中将变量导入到当前的符号表。
			//extract($this->assign);
			//dump(APP. 'views');
			//dump( ALIPHP_PATH . 'cache');die;

			$loader = new \Twig_Loader_Filesystem(APP. 'views');  //传入视图文件夹
			$twig = new \Twig_Environment($loader, array(
			    //'cache' => ALIPHP_PATH .'cache',
			));
			$template = $twig->load('index.html');   //加载一个模版文件
			$template->display($this->assign?$this->assign:array());

			//include $file;
		}
	} 




}

?>