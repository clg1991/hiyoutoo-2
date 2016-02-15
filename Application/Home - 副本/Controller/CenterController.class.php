<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller {


	

	public function centershow(){     
     $page_user_id=$_GET['page_user_id'];
     $this->assign('page_user_id',"$page_user_id");
     $publicpath=c('__PUBLIC__');/*公共文件路径*/
     $publicpath=substr($publicpath,1);/*去掉开头的斜杠*/
     $userid=session('userid');
     if(file_exists("$publicpath/Img/userifo/avatar/$page_user_id.jpg"))

        { 
        	$this->assign('useravatar',"<img src='".c('__PUBLIC__')."/Img/userifo/avatar/".$page_user_id.".jpg' />");
            

        }

        else if($page_user_id==$userid){ $this->assign('useravatar',"<a href='/index.php/center/avatarupload'>上传头像</a>"); }
    
		$this->assign('centerheader','border-bottom:5px solid #FF8247;');
		$this->display();
        
	
	}

	

	public function avatarupload(){	
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
          {
	$targ_w = $targ_h = 150;
	$jpeg_quality = 100;

	$src = 'AA/Application/Public/Img/userifo/avatar/6.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
         
	imagejpeg($dst_r,'AA/Application/Public/Img/userifo/avatar/'.$_SESSION['userid'].'.jpg',$jpeg_quality);

	exit;

           }

		$this->display(avatar);
	}



   public function infoedit(){

           
   	echo 2323;
   	$this->display();
   }
	
	
}


