<?php

class IndexAction extends Action {
	public $user_model = null;

	public function _initialize(){
		init_db_file();
		$this->user_model = M("user");
	}
	
    public function index(){
		$this->assign('login',U('index/login'));
		$this->display();
    }

    public function fun(){
    	if (is_null(session('username'))) {
    		// redirection
    		header('location:'.C('WWW'));
    	}else{
    		$this->display();
    	}
    }

    public function page(){
    	$this->display();
    }

    // 登录验证Ajax页面
    public function login(){
    	$username = $_POST['username'];
  		$password = $_POST['password'];

  		$result = $this->user_model->where(array('username'=>$username,'password'=>$password))->count();

  		if ($result <= 0) {
  			$this->ajaxReturn(array('result'=>false,'msg'=>'登录失败'));
  		}else{
  			session('username',$username);
  			$this->ajaxReturn(array('result'=>true,'msg'=>$username.'登录成功'));
  		}
    }
	
}