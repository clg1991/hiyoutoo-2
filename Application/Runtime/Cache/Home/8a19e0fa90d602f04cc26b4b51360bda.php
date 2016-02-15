<?php if (!defined('THINK_PATH')) exit(); $Content = M("Content"); $maxvoteno = $Content->max('voteno'); ?>
  <link rel="stylesheet" type="text/css" href="/AA/Application/Public//Css/Zhuye.css" />
<div class="row">

<?php $__FOR_START_22913__=empty($liststart)?0:$liststart;$__FOR_END_22913__=$liststart+9;for($jjj=$__FOR_START_22913__;$jjj < $__FOR_END_22913__;$jjj+=1){ ?><div class="col-xs-12 col-sm-12 col-md-4"  >

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