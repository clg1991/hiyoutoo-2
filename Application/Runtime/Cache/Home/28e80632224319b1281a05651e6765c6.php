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

<div style="min-height:700px;margin-top:50px" id='youtoo-body-content'> <script type="text/javascript">

 
</script>
<head>


<script type="text/javascript">
 
</script>

  <meta http-equiv="X-UA-Compatible"content="IE=11; IE=10;IE=9; IE=8; IE=7; IE=EDGE">
  <meta charset="utf-8">
</head>
<title>主页</title>

<div class="bigvotelist" style="clear:both;margin-top:0px;width:100%;min-height:1600px;

" >  




<div class="pagecontent" style="margin-left:3%;width:90%;padding:10px;min-height:1350px;" > 

<?php $Content = M("Content"); $maxvoteno = $Content->max('voteno'); ?>
  <link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/Zhuye.css" />
<div class="row">

<?php $__FOR_START_26017__=empty($liststart)?0:$liststart;$__FOR_END_26017__=$liststart+9;for($jjj=$__FOR_START_26017__;$jjj < $__FOR_END_26017__;$jjj+=1){ ?><div class="col-xs-12 col-sm-12 col-md-4"  >

<div  style="posotion:absolute;width:100%;height:440px;float:left;padding:6px;margin-bottom:10px;">

  <?php $voteno = $maxvoteno-$jjj; ?>
  

<?php $Content = M("Content"); $optionweizhi=array(); $votename = $Content->where('voteno='.$voteno)->getField('votename'); $con = mysql_connect("localhost","root",""); if (!$con) { die('Could not connect: ' . mysql_error()); } mysql_select_db("mysql", $con); $result = mysql_query("SELECT * FROM vote_record
WHERE username=$_SESSION[username] AND voteno=$voteno"); while($row = mysql_fetch_array($result)) { $yixuan=$row['optionno']; } if(file_exists("$publicpath/Img/vote/$voteno.jpg")) { $bcimgid=$voteno; } else { $bcimgid="0000"; } for ($optionno=1; $optionno<=7; $optionno++) { if ($optioncontent = $Content->where('voteno='.$voteno)->getField('option'.$optionno)) { $voteshuzu['voteno']=$voteno; $voteshuzu['optionno']=$optionno; if($optionno==$yixuan) { $optionweizhi[$optionno] = "<button  voteno="."$voteno"." optionno="."$optionno"." class='voteoption' style='background-color:#FF8247'
							 onclick='biaodantijiao("."$voteno".",$optionno".")'	
							>"."$optioncontent"."</button></br>"; } else{ $optionweizhi[$optionno] = "<button voteno="."$voteno"." optionno="."$optionno"." class='voteoption'
							 onclick='biaodantijiao("."$voteno".",$optionno".")'	
							>"."$optioncontent"."</button></br>"; } } else { break;} } ?>

<div id=<?php echo ($voteno); ?> class="votediv" style="background:url('/AA/Application/Public/Img/vote/<?php echo ($bcimgid); ?>.jpg')" >

<p class="votetitle">
 <?php echo ($votename); ?>
</p>

<?php echo ($optionweizhi[1]); ?>
<?php echo ($optionweizhi[2]); ?>
<?php echo ($optionweizhi[3]); ?>
<?php echo ($optionweizhi[4]); ?>
<?php echo ($optionweizhi[5]); ?>
<?php echo ($optionweizhi[6]); ?>
<?php echo ($optionweizhi[7]); ?>
<p votetishiid=<?php echo ($voteno); ?> style="background-color:rgba(255,130,71,0.5);color:white;border:none;display:none;padding:5px" ></p>



</div> 




 <button onclick=window.open('/index.php/Home/comment/commentshow/voteno/<?php echo ($voteno); ?>','_blank') 
 class="commentshow" >评论</button>
  </div>

  </div><?php } ?></div>


 </div>
 <div id='pagechange-module'>
<?php $__FOR_START_966__=0;$__FOR_END_966__=39;for($pageno=$__FOR_START_966__;$pageno < $__FOR_END_966__;$pageno+=9){ ?><span class="pagechange" id="<?php echo ($pageno/9+1); ?>" onclick=pagechangejs(<?php echo ($pageno); ?>) > 
第<?php echo ($pageno/9+1); ?>页
</span><?php } ?>  <!--  循环输出页数标签 -->
<input id="pageinput"  style="width:50px;"  >
<button onclick=pagechangejs() style='display:inline'>跳转</button>
</div>



</div>


 




 </div>





<div class="foot">


<center>友投网</center>

</div>



</div> <!-- 整个页面结束 -->
</body>
</html>