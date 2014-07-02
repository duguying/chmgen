<?php

class IndexAction extends Action {
	public function _initialize(){
		init_db_file();
		M("user");
	}
	
    public function index(){
		M("File");
		$this->display();
    }
	
}