function msmoduleshow(youuserid)          /*  弹出聊天框 */
{ 


     var pagewidth=document.body.clientWidth
   
    if (pagewidth>700) /* 查询媒体宽度 */
    {
     if($('.message-big').length==3) /* 如果聊天窗口大于3则直接退出，并提示 */
	 { alert('只能同时开启三个对话')
       return false
     }
	
	 if($(document).find(".message-big[youuserid="+youuserid+"]").length==1)
	 {
		 
      alert('对话已打开')		 
		 return false
	 }
               $.post("/index.php/message/message",
                   {
                     youuserid:youuserid
				   
                   },
                   function(data,status){
					 
		         $("#totalpage").append(data);
		        message_big=$('.message-big:last')
		        scrollchange(message_big)    /* 调用滚动条拉倒最底部的函数 */
		       if($('.message-big').length==2)  /* 如果当前页面有两个聊天窗口 */
		 {
			 $('.message-big:eq(1)').css("left",'300px')
			 $('.message-module:eq(1)').css("left",'300px')
		 }
		 
		 if($('.message-big').length==3) /* 如果当前页面有三个聊天窗口 */
		 {
			 $('.message-big:eq(2)').css("left",'570px')
			 $('.message-module:eq(2)').css("left",'570px')
		 }		 
		 
		 
				  
            });
			
			
	}
	
	
     if (pagewidth<700)  
	 {
		 
		       $.post("/index.php/message/message",
                  {
                   youuserid:youuserid
				   
                  },
                   function(data,status){
					 
				
		     $("#youtoo-body-content").append(data);
	         $(".jScrollbar3").attr("class","000")
		 
				  
            });
		 
	 }

}   







function message_module_show(youuserid)        /*  消息中心切换聊天框 */
{ 
          
      var pagewidth=document.body.clientWidth
   
    if (pagewidth>700) /* 查询媒体宽度 */
    {
     if($('.message-big').length==3) /* 如果聊天窗口大于3则直接退出，并提示 */
	 { alert('只能同时开启三个对话')
       return false
     }
	
	 if($(document).find(".message-big[youuserid="+youuserid+"]").length==1)
	 {
		 
      alert('对话已打开')		 
		 return false
	 }
               $.post("/index.php/message/message",
                   {
                     youuserid:youuserid
				   
                   },
                   function(data,status){
					 
		         $("#totalpage").append(data);
		        message_big=$('.message-big:last')
		        scrollchange(message_big)    /* 调用滚动条拉倒最底部的函数 */
		       if($('.message-big').length==2)  /* 如果当前页面有两个聊天窗口 */
		 {
			 $('.message-big:eq(1)').css("left",'300px')
			 $('.message-module:eq(1)').css("left",'300px')
		 }
		 
		 if($('.message-big').length==3) /* 如果当前页面有三个聊天窗口 */
		 {
			 $('.message-big:eq(2)').css("left",'570px')
			 $('.message-module:eq(2)').css("left",'570px')
		 }		 
		 
		 
				  
            });
			
			
	}
	
	
     if (pagewidth<700)  
	 {
		 
		       $.post("/index.php/message/message",
                  {
                   youuserid:youuserid
				   
                  },
                   function(data,status){
					 
				
		     $("#youtoo-body-content").append(data);
	         $(".jScrollbar3").attr("class","000")
		 
				  
            });
		 
	 }
    
}

    



function scrollchange(message_big,gundongtiao)   /* 下拉条拉到最底部 */
{
	
	message_big.find(".jScrollbar3").jScrollbar();
    message_big.find('.jScrollbar_mask').css('top','-'+parseInt(message_big.find('.jScrollbar_mask').innerHeight()-message_big.find('.jScrollbar_draggable').height()-1)+'px')
    message_big.find("div.message-content").scrollTop(message_big.find("div.message-content")[0].scrollHeight);
    message_big.find(".jScrollbar_draggable a.draggable").css({'top':parseInt(message_big.find('.jScrollbar_draggable').height()-44)});
    /* 滑动条下拉到最底部 */  
}

/* -----------------------------------------------------------------------------------------*/
		  
$(document).ready(function(){
 $('.message-module').live("click",function(e){
	 
          var id=$(e.target).attr('id'); 		
          var message_big=$("div.message-big[id="+id+"]")
		  message_big.toggle();
	      scrollchange(message_big) /* 调用滚动条拉倒最底部的函数 */
});
});	

 /* --------------------------------------------------------------------------------- */
 
 
$(document).ready(function(){
 $('.message-input-button').live("click",function(e){                /* 输入聊天内容 */
		     var id=$(e.target).attr('id'); 
			 var relationid=id;
			 var message_big=$("div.message-big[id="+id+"]")
		     var content= message_big.find('.message-input').text()
              			 
			
		    if(content.replace(/(^\s*)|(\s*$)/g,"")==""||content.charCodeAt()==32) /* 用ASCII码判断用户是否输入的全为空格或者换行 */
			{
				return false;
		    }
			else{
				
               $.post("/index.php/message/input",
                     {
					 content:content,
					 relationid:relationid
                       
                      },
                function(data,status){

					  contentload(relationid);
					  scrollchange(message_big)
					  
					  
                 });
				message_big.find('.message-input').empty();  /* 清空输入框 */
				
			}
})
})
/* ------------------------------------------------------------------------------------------*/
function contentload(relationid){
	   youuserid=$("div.message-big[id="+relationid+"]").attr('youuserid')
	   
       $.post("/index.php/message/content", /*  重新AJAX加载聊天内容 */
                  {
                    relationid:relationid,
					youuserid:youuserid
                  },
                   function(data,status){
				      message_big=$("div.message-big[id="+relationid+"]")
					  message_big.find("div.message-content").html(data);
	                  scrollchange(message_big)
            });    /*  重新AJAX加载聊天内容代码结束 */
				  
}
/* ----------------------------------------------------------------------------------------------------- */


setInterval(refresh,2000) /*  每2000毫秒刷新一次聊天内容 */
function refresh(){  

        var message_big=$(".message-big").length

        if(message_big>0)	
		{  contentload($(".message-big:eq(0)").attr('id'))}
        if(message_big>1)  
	    { contentload($(".message-big:eq(1)").attr('id')) }
        if(message_big>2)
	    { contentload($(".message-big:eq(2)").attr('id'))}
       
	   
	  
           
			 
}
setInterval(messagecount,2000) /*  每1500毫秒刷新一次新消息红点 */
function messagecount(){  

           $.post("/index.php/message/messagecount", /*  统计新消息数量 */
                  {
                    
                  },
                   function(data,status){
					   
		    $('#youtoo-layout-header-message').children("div").remove();
			if(data>99)
					
		    { $('#youtoo-layout-header-message').append("<div class='messagecount1' >99+</div>");}
			        else if (data<100 && data>9)
			{ $('#youtoo-layout-header-message').append("<div class='messagecount2' >"+data+"</div>"); }
				    else if (data>0)
			{ $('#youtoo-layout-header-message').append("<div class='messagecount3' >"+data+"</div>"); }
				
				   
				
				 
				   
				  
         });   

} 

			  

