<?php
/* 
 * aliphp 框架入口文件
 * 作  者：永乐开发 
 * 日  期：2017.9.21
 * 邮  箱：web@isu5.cn 
 * 官  网：http://www.isu5.cn  
 * 博  客：http://it.alipea.com 
 * @copyright  (C) 2015-2018 aliphp
 */ 

 //aliphp根目录
date_default_timezone_set('PRC');
define('IN_ALIPHP', true);						//框架安全策略
define('DS',DIRECTORY_SEPARATOR);  				// 定义斜线
define('ALIPHP_PATH', dirname(__FILE__).DS); 	//根目录
define('CORE', ALIPHP_PATH . 'core' .DS);		//核心框架目录
define('APP', ALIPHP_PATH . 'app' .DS);			//应用目录
define('APPNAME', 'app');						//命名空间
define('DEBUG', true);							


//引入第三方类库
require 'vendor/autoload.php';
dump($_SERVER);die;

if (DEBUG) {
	//debug开启，调用第三方错误日志显示
	$whoops = new \Whoops\Run;
	$errorTitle = 'Aliphp框架出错了！';
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTitle);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_error', 'on');
}else{
	ini_set('display_error', 'off');
}



//引入核心文件
include CORE . 'common' .DS. 'function.php';
include CORE . 'aliphp.php';

//当实例化一个类不存在的时候，自动加载
spl_autoload_register('\core\aliphp::load');

\core\aliphp::run();

?>