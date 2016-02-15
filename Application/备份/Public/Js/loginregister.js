$(document).ready(function(){

$(".loginbutton").click(function(){
	$(".loginbutton").attr('disabled',"true");
	//按钮点击失效
	var username=$('.username').val()
	
	var password=$('.password').val()
	var captcha=$('.captcha').val()
	   $.post("/index.php/login/logina",
    {
     username:username,
	 password:password,
	 captcha:captcha
    },
    function(data,status){
		
		 if ( data=='loginsuccess')
		 {     
         	
			 
			 $(".login-error-show").html("<p style='color:green'>登录成功</p>") 
			 
			 
			 setTimeout(function(){ location.href="/index.php/index/index"},2000);
			 
		
			
		 }
		
		else{ 
		
		$(".login-error-show").text(data)
		$('.loginbutton').removeAttr("disabled"); 
		//恢复点击功能
		 }
		 
		    
		 
    })
  } 
)  
 }) 
  

$(document).ready(function(){

$(".registbutton").click(function(){
      $(".registbutton").attr('disabled',"true");
      //按钮点击 失效
	var username=$('.user-regist-form').children('.username').val()
	
	var password=$('.user-regist-form').children('.password').val()
	var email=$('.user-regist-form').children('.email').val()
	var captcha=$('.user-regist-form').children('.captcha').val()
	

	
	
	   $.post("/index.php/Register/insert",
    {
		   
		
     username:username,
	 password:password,
	 email:email,
	 captcha:captcha
    },
    function(data,status){
		

		 if ( data=='registsuccess')
		 {
			  $(".regist-error-show").html("<p style='color:green'>注册成功,请登录 ^_^ </p>") 
			 
			
			 			 setTimeout(function(){ location.href="/index.php/index/index"},2000);

		 }
		
		else{ 
		
		$(".regist-error-show").text(data)
		$('.registbutton').removeAttr("disabled"); 
		//恢复按钮点击功能
		 }
		 
		    
		 
    })
  })
})
  
  