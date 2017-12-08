<?php
/**
 * 数据库配置文件
 * $dsn = "mysql:host=localhost;dbname=tzhtapp";
 * $username = 'root';
 * $password = 'root';
 */
/*return [
	'DSN' => 'mysql:host=localhost;dbname=tzhtapp',
	'USERNAME' => 'root',
	'PASSWORD' => 'root',
];*/

return [
  	// 必须配置项
	'database_type' => 'mysql',
    'database_name' => 'tzhtapp',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    //选填
      'prefix' => 'tzht_',
];