<?php
namespace Admin\Controller;
use Think\Controller;
class VocreateController extends Controller{

	public function index(){
	
       $this->display();
		
    }
	 public function insert(){
        $Content   =   D('Content');
        if($Content->create()) {
			
            $result =   $Content->add();
            if($result) {

              
				 $this->redirect('Vocreate/index', array(), 1, '创建投票项目成功');
				
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Content->getError());
        }
    }
 }
 
?>