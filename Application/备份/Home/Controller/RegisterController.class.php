<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller{
	public function Verifyregist(){	
            ob_clean();
      $Verify = new \Think\Verify();  
      $Verify->fontSize = 15;  
      $Verify->length   = 4;  
      $Verify->useNoise = false;  
      $Verify->codeSet = '0123456789';  
      $Verify->imageW = 130;  
      $Verify->imageH = 42;  
      //$Verify->expire = 600;  
      $Verify->entry('555');  
 }


	public function Register(){
		layout(false);
        $this->display();
    }
	
   public function checkverify($code, $id){
		 

    $verify = new \Think\Verify();
    return $verify->check($code, '555');
	
}
	
	 public function insert(){
		 
		 
        $User   =   D('User');
		$code=$_POST['captcha'];
		
		  
	
	if (!$this->checkverify($code, '555'))
	{ 
       echo "验证码错误!!";
	   return false;
	   

 }
        if($User->create($POST,1)) {
			
            $result =   $User->add();
            if($result) {

              
				         echo 'registsuccess';
				
                     }else{
                          $this->error('写入错误！');
                    }
                    }
		
		else{
			
			print_r($POST);
            $errordata = $User->getError();
			
			echo $errordata;
        }
    }
 }
 
?>