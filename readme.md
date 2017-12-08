## aliphp 框架文件说明

www									网站跟目录
	┝app
		┝controller 				应用控制器文件夹
		┝views 					应用视图文件夹


	┝core   核心框架
		┝common  
			┝ function.php     	函数
		┝config 					文件配置目录
			┝database.php 			数据库配置文件
			┝log.php     			日志配置文件
			┝route.php     		路由配置文件
		┝lib
			┝drive
				┝log
					┝file.php    	文件类型保存日志文件
					┝mysql.php  	数据库类型保存日志文件
			┝config.php    		框架配置类文件
			┝dbmodel.php    		框架数据库文件
			┝log.php    			框架日志类文件
		┝aliphp.php  				框架入口文件
	┝vendor							第三方类库，参考第三方类API调用		
	┝index.php  					网站入口文件	
	

