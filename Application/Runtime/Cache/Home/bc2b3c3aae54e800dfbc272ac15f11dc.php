<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
</html>
<head>
  <meta http-equiv="X-UA-Compatible"content="IE=11; IE=10;IE=9; IE=8; IE=7; IE=EDGE">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />

  <meta charset="utf-8">

</head>
<script type="text/javascript" src="/AA/Application/Public/js/gundongtiao/jquery2010.js"></script>  <!--  滚动条使用2010版本js -->                              

<script type="text/javascript" src="/AA/Application/Public//js/jquery.js"></script>




<link rel="stylesheet" type="text/css" href="/AA/Application/Public/Css/message.css" />


<link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/zhuye.css" />
<link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/Loginregister.css" />
<link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/Loginregister.css" />
<link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/layout.css" />

<link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/bootstrap-min.css" />

 <script type="text/javascript" src="/AA/Application/Public//js/bootstrap-min.js"></script>


<script type="text/javascript" src="/AA/Application/Public//js/message.js"></script>

<script type="text/javascript" src="/AA/Application/Public//js/scriptskkk.js"></script>
<script type="text/javascript" src="/AA/Application/Public//js/loginregister.js"></script>

<script type="text/javascript" src="/AA/Application/Public//js/vote.js"></script>


<body>
<div id="totalpage" style="position:relative;height:auto;width:100%;"> <!--  整个网站页面的开始 -->

<?php if( isset($_SESSION['userid']) ): ?><head>
  <meta http-equiv="X-UA-Compatible"content="IE=11; IE=10;IE=9; IE=8; IE=7; IE=EDGE">
        <meta charset="utf-8">
        
       

      

       
<script type="text/javascript">

 $(document).ready(function(){

 


});



  

  
</script>
     

</head>


<div>






<?php $Model = new \Think\Model(); $userid=SESSION('userid'); $condition="select * from vote_message where (substring_index(relationid,'to',1)=$userid and readed=0 and writerid!=$userid)

 or (substring_index(relationid,'to',-1)=$userid and readed=0 and writerid!=$userid)"; $usernewmessage=$Model->query($condition); $usernewmessage=count($usernewmessage) ?>
<!-- 以上php查询用户的未读消息数量 -->







<div class='useraccount' hidden><?php echo $_SESSION['username']; ?></div>

<nav class="navbar navbar-default" role="navigation"  id='navbar' >
   <div class="navbar-header"  id='youtoo-layout-head'  style='border:none;padding:none'>
      <button type="button" class="navbar-toggle"  id='youtoo-layout-head-button' data-toggle="collapse" 
         data-target="#example-navbar-collapse">
             导航
      </button>
   </div>
   <div class="collapse navbar-collapse" id="example-navbar-collapse" >
      <ul class="nav navbar-nav" id='navul'>
         <li class="active"><div class="youtoo-layout-header" style="<?php echo ($headzhuye); ?>" id="headzhuye" onclick="window.location.href='/'">主页</div> 
</li>
       <li><div class="youtoo-layout-header" style="<?php echo ($centerheader); ?>"  onclick="window.location.href='/index.php/Center/centershow'" ><?php echo $_SESSION['username']; ?>用户中心</div></li>
  <li><div class="youtoo-layout-header"  id="headsearch" onclick="window.location.href='/index.php/Search/search'">搜索好友</div></li>
         
<li><div class="youtoo-layout-header"  id="youtoo-layout-header-message" onclick="window.location.href='/index.php/Home/Message/message_page'" >消息



</div> </li>
<li><div class="youtoo-layout-header"  onclick="window.location.href='/index.php/Home/login/logoff'">退出</div> </li>
       
      </ul>
   </div>
</nav>






</div>



<?php else: ?> 
<div style="margin-bottom:70px">
<div class="youtoo-layout-head" >
<nav class="main_nav"  > 
    <ul style=" margin:0px 0px 0px 0px;font-size:20px"> 
        <li style=" float:left;width:100px;">
    <a class="cd-login"   >登录</a></li> 
    
        <li style=" float:left;width:100px;">
    <a class="cd-signup"  >注册</a></li> 
    <!--  <li style=" float:left;width:100px;"><a class="#cd-forgot-password" href="#0">忘记密码</a></li>  -->
    
    </ul> 
</nav>  



</br>
</div>
</div>
<div class="cd-user-modal" style="display:none">       <!--  登录和注册页面弹窗显示 -->
    <div class="cd-user-modal-container"> 
        <ul class="cd-switcher"> 
            <li><a href="#0" >用户登录</a></li> 
            <li><a href="#0" >注册新用户</a></li> 
        </ul> 
 
        <div id="cd-login">  
           <div class="page-container">
                

                  <form class="user-login-form" method="post">
          </br>
          <p class="login-error-show" style="color:red;margin-left:46px;">&nbsp</p>
                <input type="text"  class="username" name="username"placeholder=" 请输入您的用户名！">
        <div class="error" id='1'><span>+</span></div>
        </br>
                <input type="password"  class="password" name="password" placeholder=" 请输入您的用户密码！"> 
        <div class="error" id='2'><span>+</span></div>
        </br>
        <span id="tishi"></span>
        
                <input type="captcha" class="captcha" name="captcha" placeholder=" 请输入验证码！"> 
        
        
    
      
      <img  onClick="this.src=this.src+'?'+Math.random()" class="verify" src="<?php echo U('Home/Login/verify','','');?>" id="code"/>
        <div class="error" id='4'><span>+</span></div>
        
        <input type="button"  value="登录" class="loginbutton"   ></input>

                
            </form>
  <!--   <button class="registbutton" onClick="location='../register/register'"  >注册 </button> -->
         
            </div>
        </div> 
 
        <div id="cd-signup">  
                     <div class="page-container">
         
                  <form  class="user-regist-form" method="post">
          </br>
            <p class="regist-error-show" style="color:red;margin-left:46px;">&nbsp</p>
                <input type="text"  class="username" name="username"placeholder=" 请输入您的用户名！">
        <div class="error" id='1'><span>+</span></div>
        </br>
                <input type="password"  class="password" name="password" placeholder=" 请输入您的用户密码！"> 
        <div class="error" id='2'><span>+</span></div>
        </br>
        <input type=""  class="email" name="email" placeholder=" 请输入您的邮箱！无需验证"> 
        <div class="error" id='3'><span>+</span></div>
        </br>
        <span id="tishi"></span>
        
                <input type="captcha" class="captcha" name="captcha" placeholder=" 请输入验证码！"> 
        

        
    
      
      <img  onClick="this.src=this.src+'?'+Math.random()" class="verify" src="<?php echo U('Register/Verifyregist','','');?>" id="555"/>
  <div class="error" id='4'><span>+</span></div>
      <input type="button"  value="注册" class="registbutton"  ></input>

                
            </form>
  <!--   <button class="registbutton" onClick="location='../register/register'"  >注册 </button> -->
         
            </div>
        </div>         
    </div> 
</div>  
  <!-- 登录界面图层 --><?php endif; ?>

<div style="min-height:700px;margin-top:50px" id='youtoo-body-content'> 
<script type="text/javascript" src="/AA/Application/Public//Js/Jquery.js"></script>
<script type="text/javascript" src="/AA/Application/Public//Js/tuxiangcaijian/jqueryJcrop.js"></script>
<link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/tuxiangcaijian/demos.css" />
<link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/tuxiangcaijian/Jcrop.css" />

<style type="text/css">
#preview-pane {
  display: block;
  position: absolute;
  z-index: 23;
  top: 10px;
  right: -380px;
  padding: 6px;
  border: 1px rgba(0,0,0,.4) solid;
  background-color: white;

  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;

  -webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
}


#preview-pane .preview-container {
  width: 200px;
  height: 200px;
  overflow: hidden;
}

</style>
<script type="text/javascript">
  jQuery(function($){

    // Create variables (in this scope) to hold the API and image size
    var jcrop_api,
        boundx,
        boundy,

        // Grab some information about the preview pane
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();
    
    console.log('init',[xsize,ysize]);
    $('#cropbox').Jcrop({
      onChange: updatePreview,
      onSelect: updatePreview,
      aspectRatio: xsize / ysize
    },function(){
      // Use the API to get the real image size
      var bounds = this.getBounds();
      boundx = bounds[0];
      boundy = bounds[1];
      // Store the API in the jcrop_api variable
      jcrop_api = this;

      // Move the preview into the jcrop container for css positioning
      $preview.appendTo(jcrop_api.ui.holder);
    });

    function updatePreview(c)
    {
      if (parseInt(c.w) > 0)
      {
        var rx = xsize / c.w;
        var ry = ysize / c.h;

        $pimg.css({
          width: Math.round(rx * boundx) + 'px',
          height: Math.round(ry * boundy) + 'px',
          marginLeft: '-' + Math.round(rx * c.x) + 'px',
          marginTop: '-' + Math.round(ry * c.y) + 'px'
        });
      }
    };

  });
</script>
<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script
>

</head>


<form action="/index.php/center/imgupload" enctype="multipart/form-data" method="post" >
<input type="text" name="name" />
<input type="file" name="photo" />
<input type="submit" value="提交" >
</form>




		<img src="/AA/Application/Public/Img/userifo/avatar/<?php echo ($userid); ?>.jpg"  id="cropbox" onerror="this.style.display='none';" />
  <div id="preview-pane">
    <div class="preview-container">
      <img src="/AA/Application/Public/Img/userifo/avatar/<?php echo ($userid); ?>.jpg" class="jcrop-preview" alt="Preview"   />
    </div>
  </div>
		<!-- This is the form that our event handler fills -->
		<form action="avatarupload" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="submit" value="完成头像" class="btn btn-large btn-inverse" />
		</form>




</html> </div>





<div class="foot">


<center>友投网</center>

</div>



</div> <!-- 整个页面结束 -->
</body>
</html>