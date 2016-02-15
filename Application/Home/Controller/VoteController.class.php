<?php
namespace Home\Controller;
use Think\Controller;
class VoteController extends Controller{
	public function vote(){
        $this->display();
    }
	public function votelist($liststart){


		 $publicpath=c('__PUBLIC__');

        $this->assign('publicpath',$publicpath);

        $this->liststart = $liststart;
		$this->listend = $liststart+8;
		layout(false);

        $this->display();
    }  /* 投票项目框九宫格列表 */
	
	 public function _before_voteinsert($voteno,$optionno){
		 
		    $data['username'] = session('username');
			$data['voteno'] = I('post.voteno');
			$data['optionno']=I('post.optionno');

		    $Record   =  D('Record');

			if ($Record->create($data)){
				
			}

            else {  
	           $this->redirect('index/index', array(), 1 ,$Record->getError());
  
     // 验证通过 执行登录操作
        }  
    }        
	 
	
	public function voteinsert($voteno,$optionno){
		
		
		  
          unset($data);//清空数组
	        $data['username'] = session('username');
	         $data['userid'] = session('userid');
			$data['voteno'] = $voteno;
	      
           
           $Record   =  D('Record');
			
		
 			$voted = $Record->where($data)->find();
			if( $voted ) //判断是否已经投票
			{ 
			
			
			    
				 
			     
			
			     
			
                  $Record->where($data)->setField('optionno',I('post.optionno'));
				  $Record->where($data)->setField('time',time());
				 
		         echo '已参与过该投票，将覆盖之前的选择';
				  
	 	     }
			  else {
		        	$data['optionno'] =I('post.optionno');
			
			        $data['time']=time();
			
                 $Record->add($data);
		
		     	 echo '投票成功';
		 
		        } 
		
       
    }
	
		

 }
 
?>