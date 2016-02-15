

 function biaodantijiao(voteno,optionno){
      
      if($(".useraccount").text()=='')
      {

      	alert("请登陆后参与投票")

      	 return; 
      }





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
		
    }); 
   
  } //Jquery实现不刷新投票





  
