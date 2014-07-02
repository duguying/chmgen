<?php
return array(
	'ROOT' => getcwd().'/',//项目根目录，必须开启
	'WWW' => preg_replace('/[\w|.]*$/i', '', $_SERVER['SCRIPT_NAME']),//网站根目录，必须开启
	'GEN' => getcwd().'/static/gen/',
	'URL_CASE_INSENSITIVE' =>true,//兼容URL小写，开启
	'LOAD_EXT_FILE'=>'function',//载入自定义函数库，必须开启

	'DB_TYPE' => 'pdo',
	'DB_DSN' => 'sqlite:./chmgen.db', //冒号后面是数据库文件的地址，我的数据库是放在站点根目录，就直接这样写。
	'DB_PREFIX' => '',
	'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8
	'DB_FIELDS_CACHE' => false, // 启用字段缓存
);
?>