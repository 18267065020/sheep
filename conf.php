<?php 
SESSION_START();
return  array (         // -------------> xiunophp 依赖的配置         
	'db'=>array(                 
		'type'=>'pdo_mysql',                 
		'pdo_mysql' => array (                         
			'master' => array (                                                                                           
				'host' => '127.0.0.1',                                                                
				'user' => 'root',                                 
				'password' => 'sheep',                                         
				'name' => 'eat',                                 
				'charset' => 'utf8',                                                          
				'engine'=>'myisam',  // innodb                         
				),                                               
			'slaves' => array()                 
			)         
		),         
	'tmp_path' => './',                  // 可以配置为 linux 下的 /dev/shm ，通过内存缓存临时文件         
	'log_path' => './'); 
?>