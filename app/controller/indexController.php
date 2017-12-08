<?php
/* 
 * aliphp 控制器类 
 * 作  者：永乐开发 
 * 日  期：2017.9.21
 * 邮  箱：web@isu5.cn 
 * 官  网：http://www.isu5.cn  
 * 博  客：http://it.alipea.com 
 * @copyright  (C) 2015-2018 aliphp
 */ 
namespace app\controller;
use core\lib\config;
use core\lib\dbmodel;

class indexcontroller extends \core\aliphp{


	public function index(){

		//p('it is index controller');
	/*	$db = new \core\lib\dbmodel();
		$sql = 'select * from tzht_user';
		$ret = $db->query($sql);
		p($ret->fetchAll());
 		
		 
		
		$db = new dbmodel();
		//dump($db);
		$datas = $db->select("conference", [
		    "title",
		    "companyname"
		]);
		dump($datas);*/
	


		$data = 'hello world !';
		$title = '视图views';
		$this->assign('data',$data);
		$this->assign('title',$title);
		$this->display('index/index.html');


	}


}