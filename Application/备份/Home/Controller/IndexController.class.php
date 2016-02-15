<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/* 
	public function userexpire(){
		
		
		 if(isset($_SESSION['expiretime'])) { 
		
         if($_SESSION['expiretime'] < time()) {
		            unset($_SESSION['expiretime']);
           		    session('userid',null);
					session('userid',null);
				    session('expiretime',null);
		            redirect(U('index/index'));
      }else   {
                    $_SESSION['expiretime'] = time() + 6; // 刷新时间戳
             }
      }
		
	}    */
	
	
    public function index(){
		 
		
        if(session('username'))
		{ 

	 
			
			$this->assign('username',session('username'));
			
		}
           		$this->assign('headzhuye','border-bottom:5px solid #FF8247;');

			$this->display();
	   /*  $this->userexpire(); */
		
			/*    session(array('name'=>'haha3','expire'=>5));
			session('haha3','156');   */ 
			/*  $kaka=ini_get('session.gc_maxlifetime');
			  $kaka2=ini_get('session.cookie_lifetime');
			 
			$this->assign('kaka',session('haha3').$kaka.'7'.$kaka2);

		echo $kaka.$kaka2;
		$this->display(); */
		
	      

                
      /*    }else{
	            $this->redirect('login/login', array(), 1,"请登录");
      }  */

		 
}
	
}