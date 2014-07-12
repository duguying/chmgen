<?php

class SaveAction extends Action{
	public $user = NULL;
	public $file = NULL;
	public $log = NULL;

	public function _initialize(){
		init_db_file();
		$this->user = M("user");
		$this->file = M("file");
		$this->log = M("log");
	}
	
	public function _empty($name){
		$this->show("hello");
	}

}