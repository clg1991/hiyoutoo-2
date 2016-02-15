<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller {


	 public function centershow(){   


     $page_user_id=$_SESSION['userid']  ;
     $this->assign('page_user_id',"$page_user_id");
     $publicpath=c('__PUBLIC__');/*公共文件路径*/
     $userid=session('userid');
     if(file_exists("$publicpath/Img/userifo/avatar/$page_user_id.jpg"))

        { 
        	$this->assign('useravatar',"<img class='avatarimg' 

        		src='/".c('__PUBLIC__')."/Img/userifo/avatar/".$page_user_id.".jpg' height='150' width='150'/>
            <a href='/index.php/center/avatarupload'>编辑头像</a>");
        

        }

        else if($page_user_id==$userid){ $this->assign('useravatar',"<a href='/index.php/center/avatarupload'>编辑头像</a>"); }
    
      if($page_user_id==$userid){

        
       $this->assign('ifeditavatar',"<a href='/index.php/center/avatarupload' style='display:none'>编辑头像</a>");

      }



		$this->assign('centerheader','border-bottom:5px solid #FF8247;');

        $this->user_trace();
		$this->display();

	}

	
public function imgupload(){             /*先上传原始图片*/
     $publicpath=c('__PUBLIC__');/*公共文件路径*/

    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    
    $upload->autoSub   =     false;//是否自动创建子目录，选择否

    $upload->saveName  =     $_SESSION['userid'];
    $upload->replace   =     true;  //覆盖同一个用户上传的头像源文件
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =      $publicpath."/Img/userifo/avatar/"; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
    }else{// 上传成功
        $this->redirect('center/avatarupload');
    }



}

    public function avatarupload(){

    $image = new \Think\Image(); 
    $publicpath=c('__PUBLIC__');/*公共文件路径*/
    $userid=$_SESSION['userid'];


     $publicpath=c('__PUBLIC__');/*公共文件路径*/
     if(file_exists("$publicpath/Img/userifo/avatar/$page_user_id.jpg"))
     {
    $image->open("$publicpath/Img/userifo/avatar/$userid.jpg");
    $image->thumb(750, 750)->save("$publicpath/Img/userifo/avatar/$userid.jpg");
        }
       
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
          {
	$targ_w = $targ_h = 150;
	$jpeg_quality = 100;

	$src ="AA/Application/Public/Img/userifo/avatar/".$_SESSION['userid'].".jpg";
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
         
	imagejpeg($dst_r,'AA/Application/Public/Img/userifo/avatar/'.$_SESSION['userid'].'.jpg',$jpeg_quality);
      $this->redirect('/Center/centershow');
	exit;

           }

		$this->display(avatar);
	}


    public function user_trace(){

        $page_user_id=$_GET['page_user_id'];
    	  $Record=M('Record');
 
      $voterecord=$Record->where('userid=8')->order('time')->select();

      $time=time();
      $this->assign('time',$time);

      $this->assign('voterecord',$voterecord);
          

    }



   public function infoedit(){

           
   	$this->display();
   }
	
	
}


