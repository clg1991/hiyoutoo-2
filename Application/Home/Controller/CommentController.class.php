<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller{
	
	public function commentshow($voteno){
		 $Content=D('Content');
		 $votetitle=$Content->where("voteno=$voteno")->getField('votename');
		 
		 $this->assign('votetitle',$votetitle);
		  $this->assign('voteno',$voteno);
          $this->display();
}

	public function commentinsert($voteno,$comment){
			
			      $Comment=D('Comment');
		          $commentcontent['userid']=$_SESSION['userid'];
				  $commentcontent['username']=$_SESSION['username'];
				
				  $commentcontent['voteno']=$voteno;
				  
				  $commentcontent['comment']=$comment;
				  
				  $commentcontent['time']= time();
				  $Comment->add($commentcontent); 
		/*  $this->assign('voteno',$voteno);
		 
          $this->display(); */
}
	
          public function commentlist($voteno){
			
			      layout(false);
			    
				   $Comment=D('Comment');
                   $commentlist = $Comment->where("voteno=($voteno)")->order('commentid desc')->limit(36)->select();
				  
				   
				   foreach($commentlist as $key=>$commentlists)
				   {
				            /* 判断是否为当天，如果是就去掉日期 */
				           if(date("Y-m-d",$commentlist[$key]['time'])==date("Y-m-d",time()))
							   
							   { 
							   $commentlist[$key]['time']=date("H:i:s",$commentlist[$key]['time']);
							   }
							   else
							   {
								   $commentlist[$key]['time']=date("Y-m-d H:i:s",$commentlist[$key]['time']);
								   }
						   /* 判断是否为当天，如果是就去掉日期 */
				       
				       if ($commentlists['username']==session('username'))
				      { 
				   

                				  $commentlist[$key]['deletable']='删除';
				       }
				        
				   }
				   
				    $this->assign('commentlist',$commentlist);
					
				   $this->display();
				
				
		/*  $this->assign('voteno',$voteno);
		 
          $this->display(); */
}


     
public function commentdelet($commentid){
        
	$Comment=D('Comment');
                   $commentlist = $Comment->where("commentid=$commentid")->delete();
}


 /* 拉取更多评论的函数 -------------------------------------*/
public function commentmore(){      /* 拉取更多评论的函数 */
        
	              $Comment=D('Comment');
                   
				  $condition['voteno']=$_POST['voteno'];
				
				 $condition['commentid']=array('lt',$_POST['ltcommentid']);
				$commentlist=$Comment->where($condition)->order('commentid desc')->limit(36)->select();
				 $commentlistcount=count($commentlist);
				if( $commentlistcount==0)  /* 如果查询结果为空则退出函数 */
				{ echo 0;}
				else
				{
					
			      	foreach($commentlist as $key=>$commentlists)
				    {
				            /* 判断是否为当天，如果是就去掉日期 */
				           if(date("Y-m-d",$commentlist[$key]['time'])==date("Y-m-d",time()))
							   
							   { 
							   $commentlist[$key]['time']=date("H:i:s",$commentlist[$key]['time']);
							   }
							   else
							   {
								   $commentlist[$key]['time']=date("Y-m-d H:i:s",$commentlist[$key]['time']);
								   }
						   /* 判断是否为当天，如果是就去掉日期 */
				       
				       if ($commentlists['username']==session('username'))
				      { 
				   

                				  $commentlist[$key]['deletable']='删除';
				       }
				        
				   }
				         layout(false);
		                 $this->assign('commentlist',$commentlist);
			             $this->display('commentlist'); 
					  
				}
				
				
				
				

}




	

}
 
?>