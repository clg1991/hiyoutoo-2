
jQuery(document).ready(function() {

    $('.page-container form').submit(function(){
        var username = $(this).find('.username').val();
        var password = $(this).find('.password').val();
		var captcha = $(this).find('.captcha').val();
		 var email = $(this).find('.email').val();
        if(username == '') {
            $(this).find('.error#1').fadeOut('fast');
            $(this).find('.error#1').fadeIn('fast', function(){
                $(this).parent().find('.username').focus();
            });
            return false;
        }
		
        if(password == '') {
            $(this).find('.error#2').fadeOut('fast');
            $(this).find('.error#2').fadeIn('fast', function(){
                $(this).parent().find('.password').focus();
            });
            return false;
        }
		
		if(email== '') {
            $(this).find('.error#3').fadeOut('fast');
            $(this).find('.error#3').fadeIn('fast', function(){
                $(this).parent().find('.email').focus();
            });
            return false;
        }
		if(captcha == '') {
            $(this).find('.error#4').fadeOut('fast');
            $(this).find('.error#4').fadeIn('fast', function(){
                $(this).parent().find('.captcha').focus();
            });
            return false;
        }
		  
		
		
		
    });

    $('.page-container form .username, .page-container form .password,.page-container form .email,.page-container form .captcha').keyup(function(){
        $(this).parent().find('.error').fadeOut('fast');
    });

});






jQuery(document).ready(function($){ 

    var $form_modal = $('.cd-user-modal'), 
        $form_login = $form_modal.find('#cd-login'), 
        $form_signup = $form_modal.find('#cd-signup'), 
		/*  $form_forgot_password=$form_modal.find('#cd-forgot-password'),  */
        $form_modal_tab = $('.cd-switcher'), 
        $tab_login = $form_modal_tab.children('li').eq(0).children('a'), 
        $tab_signup = $form_modal_tab.children('li').eq(1).children('a'), 
        $main_nav = $('.main_nav'); 
 
    //弹出窗口 
    $main_nav.on('click', function(event){

        if( $(event.target).is($main_nav) ) { 
            // on mobile open the submenu 
            $(this).children('ul').toggleClass('is-visible'); 
        } else { 
            // on mobile close submenu 
            $main_nav.children('ul').removeClass('is-visible'); 
            //show modal layer 
            $form_modal.show();     
            //show the selected form 
            ( $(event.target).is('.cd-signup') ) ? signup_selected() : login_selected(); 
        } 
 
    }); 
 
    //关闭弹出窗口 
    $('.cd-user-modal').on('click', function(event){ 
        if( $(event.target).is($form_modal) || $(event.target).is('.cd-close-form') ) { 
            $form_modal.hide(); 
        }     
    }); 
    //使用Esc键关闭弹出窗口 
    $(document).keyup(function(event){ 
        if(event.which=='27'){ 
            $form_modal.hide(); 
        } 
    }); 
 
    //切换表单 
    $form_modal_tab.on('click', function(event) { 
        event.preventDefault(); 
        ( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected(); 
    }); 
 
    function login_selected(){ 
        $form_login.addClass('is-selected'); 
        $form_signup.removeClass('is-selected'); 
        <!-- $form_forgot_password.removeClass('is-selected');  -->
        $tab_login.addClass('selected'); 
        $tab_signup.removeClass('selected'); 
    } 
 
    function signup_selected(){ 
        $form_login.removeClass('is-selected'); 
        $form_signup.addClass('is-selected'); 
       <!--  $form_forgot_password.removeClass('is-selected');  -->
        $tab_login.removeClass('selected'); 
        $tab_signup.addClass('selected'); 
    } 
 
}); 






  
   window.onload=function(){
   
    	$("span.pagechange[id=1]").css('border','1px solid #FF8247') 
 }
  
  function votepage(pageno){
      
	   $.post("/index.php/vote/voteinsert",
    {
      voteno:voteno,
      optionno:optionno
    },
    function(data,status){
		  $("button[voteno='"+voteno+"']").css("background-color","rgba(0,0,0,0.6)");
	  $("button[voteno='"+voteno+"'][optionno='"+optionno+"']").css("background-color","#FF8247");
	  $("[votetishiid='"+voteno+"']").text(data);
	  $("[votetishiid='"+voteno+"']").show() ;
	      setTimeout(xiaochutishi,4000); //4秒后隐藏提示
		 function xiaochutishi(){  $("[votetishiid='"+voteno+"']").hide() ;}
	
    })
  } 
  
  
  
 

  window.onload=changeheader; 

   function pagechangejs(liststart){ 
     if(document.getElementById('pageinput').value)
    {var yeshu=document.getElementById('pageinput').value
	var liststart=yeshu*9-9;} 
	

	setTimeout(xiaochuyeshu,4000)
	function xiaochuyeshu(){ document.getElementById('pageinput').value='';}  	 
	$(".pagecontent").html("<div style='margin-top:10px;hegiht:100%'>正在载入...</div>")
	     
    $(".pagecontent").load("/index.php/vote/votelist",{liststart:liststart})
   
	
    $("span.pagechange").css('border','none') 
  	$("span.pagechange[id="+(liststart+9)/9+"]").css('border','1px solid #FF8247') 
	}