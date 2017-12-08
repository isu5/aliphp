<?php
//文件存储

namespace core\lib\drive\log;

use \core\lib\config;

class file{

	public $path; //日志的存储位置
	public function __construct(){
		$conf = config::get('OPTION','log');
		$this->path = $conf['PATH'];
		//p($this->path);
	}


	public function log($message,$file = 'log'){
		/**
		 * 1.确定文件存储的位置是否存在
		 * 2. 新建目录
		 * 3.写入目录
		 */
		if (!is_dir($this->path.date('YmdH'))) {
			mkdir($this->path.date('YmdH'),'0777',true);
		}
		
		//p($this->path.$file.'.php');
		return file_put_contents($this->path.date('YmdH'). DS .$file.'.php', date('Y-m-d H:i:s').json_encode($message).PHP_EOL ,FILE_APPEND); 

	}

}