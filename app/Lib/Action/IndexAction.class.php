<?php

class IndexAction extends Action {
	public $user_model = null;
  public $file_model = null;
  public $user = null;

	public function _initialize(){
		init_db_file();
		$this->user_model = M("user");
    $this->file_model = M("file");
    $this->user = session('username');
    $this->assign('user',$this->user);
	}
	
  // 登录页
  public function index(){
    if (!is_null($this->user)) {
      // redirection
      header('location:'.U('index/main'));
    }

		$this->assign('login',U('index/login'));
		$this->display();
  }

  public function main(){
    if (is_null($this->user)) {
      // redirection
      header('location:'.C('WWW'));
    }

    $this->display();
  }

  // 函数页
  public function fun(){
  	if (is_null($this->user)) {
  		// redirection
  		header('location:'.C('WWW'));
  	}else{
      $key = $_GET['key'];
      $result = $this->file_model->where(array('name'=>$key))->find();
      //var_dump(json_encode($result));
      $this->assign('data',json_encode($result));
  		$this->display();
  	}
  }

  // 普通页面
  public function page(){
  	if (is_null($this->user)) {
      // redirection
      header('location:'.C('WWW'));
    }else{
      $this->display();
    }
  }

  // 编辑
  public function edit(){
    $key = (string)$_GET['key'];
    $type = (1 == (int)$_GET['type'])?1:0;
    //var_dump(array('key'=>$key,'type'=>$type));
    if($type == 0){
      header('location:'.U('index/fun').'?key='.$key);
    }else{
      header('location:'.U('index/page').'?key='.$key);
    }
    
  }

  // 登录验证Ajax页面
  public function login(){
  	$username = $_POST['username'];
		$password = $_POST['password'];

    // 如果已经登录
    if (!is_null($this->user)) {
      // redirection
      $this->ajaxReturn(array('result'=>true,'msg'=>$username.'登录成功','redirect_url'=>U('index/main')));
    }

		$result = $this->user_model->where(array('username'=>$username,'password'=>$password))->count();

		if ($result <= 0) {
			$this->ajaxReturn(array('result'=>false,'msg'=>'登录失败'));
		}else{
			session('username',$username);
			$this->ajaxReturn(array('result'=>true,'msg'=>$username.'登录成功','redirect_url'=>U('index/main')));
		}
  }
	
  // 登出
  public function logout(){
    session(null);
    header('location:'.C('WWW'));
  }
}