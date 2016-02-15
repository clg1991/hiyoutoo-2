<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
	
	public function Verify(){	
            ob_clean();
      $Verify = new \Think\Verify();  
      $Verify->fontSize = 15;  
      $Verify->length   = 4;  
      $Verify->useNoise = false;  
      $Verify->codeSet = '0123456789';  
      $Verify->imageW = 130;  
      $Verify->imageH = 42;  
      //$Verify->expire = 600;  
      $Verify->entry('code');  
 }

	public function Login(){
		session_start();
		layout(false);
		
        echo  session('username');
        $this->display();

  }

	  public function checkverify($code, $id){
		 
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
	
}
	
	
	 public function logina(){
        $User   =   D('User');
		
		$code=$_POST['captcha'];
		
		  
	
	if (!$this->checkverify($code, 'code'))
	{ 
       echo "验证码错误!!";
	   return false;
	   

 }
	
	
       
              $condition['username']=$_POST['username'];
			  $condition['password']= md5($_POST['password']);
			  
		
     	 
		
		
             $result =   $User->where($condition)->find();
		
            if($result) { 
			/* 
				$userid =$result['userid'];
				 $username =$result['username'];
                 $_SESSION['expiretime'] = time() + 6666;
				 echo $_SESSION['expiretime'];
				session('userid',$userid);
				session('username',$username);
	$this->redirect('index/index', array(), 0, ''); */
	$userid =$result['userid'];
	 $username =$result['username'];

				session('username',$username);
				session('userid',$userid);
				
				echo 'loginsuccess';
				
				
            }
			
			else{
				
                echo '账号或密码错误!!';
				return false;
				
            }   
        }
		
		
		
		
		
		
		public function logoff() 
		{
    			session('username',null);
				session('userid',null);
				/* session('expiretime',null); */
		redirect(U('index/index'));
		          
		
		}
		

 }
 
?>