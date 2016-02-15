<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller {
	
	
	
	/*  -----------------------------------------------------首次加载聊天框的函数 */
	public function message($youusername){             
		$User = M("User");
	
		$youuserid=$User->where("username='$youusername'")->getField('userid');
		
		                                                    /* 根据对方名字寻找对面ID */
		$Message = M("Message");
		 layout(false);
		 
		 
		 
		 	 if(session('userid')<$youuserid)        /* 生成会话关系编号 */
		 { $condition['relationid']=session('userid').'to'.$youuserid;  }
		 else{ $condition['relationid']=$youuserid.'to'.session('userid'); }
		$mslist = $Message->where($condition)->order('msid desc')->limit(100)->select();/* 根据会话关系编号寻找会话记录 */
		$condition['writerid']=$youuserid;
		 $Message->where($condition)->setField('readed','1');
		krsort($mslist);/*  倒叙排列 */
		if($mslist)
			{ 
		$this->assign('list',$mslist);
		$this->assign('relationid',$condition['relationid']);
		
		    }
		else{
			$this->assign('relationid',$condition['relationid']);
			
		}  /* 如果没有记录就不操作 */
		 $this->assign('youusername',$youusername);
		 $this->assign('youuserid',$youuserid);
        $this->assign('userid',session('userid'));
		$this->display();
		
	}
	
/* ---------------------------------聊天框内容更新函数 */
	public function content(){  
	    
		$Message = M("Message");
		 layout(false);
		 	$condition['relationid']=$_POST['relationid'];/* 从聊天框通过JS获得会话关系编号 */
		$mslist = $Message->where($condition)->order('msid desc')->limit(100)->select();/* 根据会话关系编号寻找会话记录 */
		$condition['writerid']=$_POST['youuserid'];
				 $Message->where($condition)->setField('readed','1'); /* 标记为已读 */
				 

		krsort($mslist);/*  倒叙排列 */
		if($mslist)
			{ $this->assign('list',$mslist);}
		else{
			
			return false;
		}  /* 如果没有记录就不操作 */
        $this->assign('userid',session('userid'));
		 
		$this->display();
		
	}		
/* ---------------------------------------------------------------聊天内容写入函数 */
	public function input(){
		
		 
		 $Message = M("Message"); // 实例化User对象
         $data['content'] = $_POST['content'];
		 $data['writerid'] = session('userid');
         
		 $data['relationid']=$_POST['relationid'];
		 
		 $data['time'] = time();
		 
         $Message->add($data);
		
	}
/* ---------------------------------------------------------------用户新消息数量统计*/			
		public function messagecount(){
		
		 
		 $Model = new \Think\Model();

          $userid=SESSION('userid');

  
      $condition="select * from vote_message where (substring_index(relationid,'to',1)=$userid and readed=0 and writerid!=$userid)

            or (substring_index(relationid,'to',-1)=$userid and readed=0 and writerid!=$userid)";
 
 
         $usernewmessage=$Model->query($condition);
 
        echo  $usernewmessage=count($usernewmessage);
		
	}	
		
		
		
		
		
		
		
		
		
}