<?php

// 初始化数据库，创建表
function init_db_file(){
	// create table `File`
	// create table `Relation`
	// create table `Log`
	$Model = M();
	
	$sql1 = "CREATE TABLE [info] ([key] NVARCHAR(512)  UNIQUE NOT NULL PRIMARY KEY,[value] TEXT  NULL)";
	$sql2 = "CREATE TABLE [file] ([id] INTEGER  PRIMARY KEY NOT NULL,[type] NUMERIC DEFAULT '0' NOT NULL,[name] NVARCHAR(512)  UNIQUE NULL,[f_declaration] TEXT  NULL,[f_include] TEXT  NULL,[f_function] TEXT  NULL,[f_parms] TEXT  NULL,[f_returns] TEXT  NULL,[f_description] TEXT  NULL,[f_warning] TEXT  NULL,[f_demos] TEXT  NULL,[p_content] TEXT  NULL)";
	$sql3 = "CREATE TABLE [relation] ([id] INTEGER  NOT NULL PRIMARY KEY,[father] INTEGER  NOT NULL,[son] INTEGER  UNIQUE NOT NULL)";
	$sql4 = "CREATE TABLE [user] ([id] INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,[username] NVARCHAR(512)  UNIQUE NOT NULL,[password] NVARCHAR(512)  NOT NULL)";
	
	if(!check_table_exist("info")){
		$Model->query($sql1);
	}
	
	if(!check_table_exist("file")){
		$Model->query($sql2);
	}
	
	if(!check_table_exist("relation")){
		$Model->query($sql3);
	}
	
	if(!check_table_exist("user")){
		$Model->query($sql4);
	}
	
}

// 检查某个表是否存在
function check_table_exist($table){
	// SELECT count(*) FROM sqlite_master WHERE type='table' AND name='tableName';
	
	if(!is_string($table)){
		return false;
	}
	
	$sql = "SELECT count(*) as num FROM sqlite_master WHERE type='table' AND name='".$table."'";
	$Model = M();
	$num = $Model->query($sql);
	
	if($num[0]['num'] <= 0){
		return false;
	}else{
		return true;
	}
}