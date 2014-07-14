<?php

class SearchAction extends Action{
	public $file = NULL;

	public function _initialize(){
		init_db_file();
		$this->file = M("file");
	}
	
	public function _empty(){
		$key = $_GET['k'];

		if(!$key){
			$this->ajaxReturn(null);
		}else{
			$key = (string)$key;
		}

		$result = $this->file->where('name like "%'.$key.'%"')->select();
		$finded = false;
		$num = count($result);

		for ($i = 0; $i < $num; $i++) { 
			if ($result[$i]['name'] == $key) {
				$finded = true;
			}
		}

		$result['number'] = $num;
		
		if(!$finded){
			$result['create'] = $key;
		}

		$this->ajaxReturn($result);
	}

}