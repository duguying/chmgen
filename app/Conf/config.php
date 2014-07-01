<?php
return array(
	'DB_TYPE' => 'pdo',
	'DB_DSN' => 'sqlite:./chmgen.db', //冒号后面是数据库文件的地址，我的数据库是放在站点根目录，就直接这样写。
	'DB_PREFIX' => 'km_',
	'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8
	'DB_FIELDS_CACHE' => false, // 启用字段缓存
);
?>