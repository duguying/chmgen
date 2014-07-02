<?php

class GenerateAction extends Action {
	public function _initialize(){
		init_db_file();
		M("file");
	}
	
	// TODO
	
	public function html(){
		$this->assign('title','示例页面');
		$this->buildHtml("demo.html",C('GEN').'html/',C('GEN').'tmp/function.html','utf8');
		$this->ajaxReturn(array('result'=>true,'msg'=>'生成成功'));
	}
	
    public function hhk(){
		$content = $this->fetch(C('GEN').'tmp/demo.hhk');
		
        $filename =  C('GEN').'project.hhk';
        if(!is_dir(dirname($filename))){
            mkdir(dirname($filename),0755,true);
		}
        
        if(false === file_put_contents($filename,$content)){
		    $this->ajaxReturn(array('result'=>false,'msg'=>'生成失败'));
		}
		
		$this->ajaxReturn(array('result'=>true,'msg'=>'生成成功'));
        
    }
	
	public function hhp(){
		$content = $this->fetch(C('GEN').'tmp/demo.hhp');
		
        $filename =  C('GEN').'project.hhp';
        if(!is_dir(dirname($filename))){
            mkdir(dirname($filename),0755,true);
		}
        
        if(false === file_put_contents($filename,$content)){
		    $this->ajaxReturn(array('result'=>false,'msg'=>'生成失败'));
		}
		
		$this->ajaxReturn(array('result'=>true,'msg'=>'生成成功'));
    }
	
	public function hhc(){
		$content = $this->fetch(C('GEN').'tmp/demo.hhc');
		
        $filename =  C('GEN').'project.hhc';
        if(!is_dir(dirname($filename))){
            mkdir(dirname($filename),0755,true);
		}
        
        if(false === file_put_contents($filename,$content)){
		    $this->ajaxReturn(array('result'=>false,'msg'=>'生成失败'));
		}
		
		$this->ajaxReturn(array('result'=>true,'msg'=>'生成成功'));
    }
}