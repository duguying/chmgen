<?php

class SearchAction extends Action{
	public $file = NULL;

	public function _initialize(){
		init_db_file();
		$this->file = M("file");
	}
	
	public function _empty(){
		$this->show("hello");
	}

}