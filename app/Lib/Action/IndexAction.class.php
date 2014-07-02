<?php
// 本类由系统自动生成，仅供测试用途
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