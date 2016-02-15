








function commentinsert(voteno)
        {
			
			
				
			 if($(".comment-input").val()=="输入评论"||$(".comment-input").val()==""||
			$(".comment-input").val().charCodeAt()==32) /* 用ASCII码判断用户是否输入的全为空格或者换行 */
			
		
			{
				alert('请输入评论')
				return false
			}
			
			   $.post("/index.php/comment/commentinsert",
          {
       voteno:voteno,
	   comment: $(".comment-input").val()
	   
      
           },
    function(data,status){
		
	       var voteno = $("[class='comment-module']").attr("id")
	  
     $.post("/index.php/Comment/commentlist",
    {
       voteno:voteno,
	   
	   
      
    },
    function(data,status){
		
	
	   $('.comment-content-module').html(data)
		  
	          
    })  
    })  
		     
		
		}
		
		
		

$(document).ready(function(){

    $("div.votediv").height(440);
	

 
});



/* 以下为删除评论------------------------------------------- */
   function commentdelet(commentid){
	   
	   
	
    $.post("/index.php/comment/commentdelet",
    {
      
      commentid:commentid
    },
    function(data,status){
      
	  
	  /*   以下为重载评论框 */
	  	       var voteno = $("[class='comment-module']").attr("id")
	  
     $.post("/index.php/Comment/commentlist",
    {
       voteno:voteno,
	   
	   
      
    },
    function(data,status){
	
	   $('.comment-content-module').html(data)
		  
	          
    }) 
	  
	  
	  
    });  /*  重载评论框结束 */
  }
                          
/* 删除评论结束 ----------------------------------------------------------*/


     $(function(){
         /*评论框进入焦点时触发*/
         $(".comment-input").focus(function(){
              
              if($(this).val()=="输入评论"){
                  $(this).val("");
				 document.getElementById('8888').style.color = "black";
              }
         });  
         /*评论框失去焦点时触发*/
         $(".comment-input").blur(function(){
		 
              if($(this).val()==""){
                  $(this).val("输入评论");
				  document.getElementById('8888').style.color = "gray";
              }
         });
     });
	 
/* 	------------------- 首次加载评论 */
	 $(document).ready(function(){
	var voteno = $("[class='comment-module']").attr("id")
	  
     $.post("/index.php/Comment/commentlist",
    {
       voteno:voteno,
	   
	   
      
    },
    function(data,status){
	
	   $('.comment-content-module').html(data)
		  
	          
    })  
}); 
/*  -------------拉取更多评论 */
	$('.comment-more').click(
	  function(){

		  var ltcommentid=$('div.comment-module-list-user:last').attr('id');/*  获取当前页面评论的最小ID值，即评论最顶部ID值 */
		  
		  var voteno=$('.comment-page').attr('id');
		  
		   $.post("/index.php/Comment/commentmore",
    {
       voteno:voteno,
	   ltcommentid:ltcommentid
	   
      
    },
    function(data,status){
		 if(data==0)
		 {  alert('没有更多评论')  }
	     else{
	
	           $('.comment-content-little:last').after(data)
		 } 
	          
    })  
		  
		  
		  
		  
		  
		  
	  }
	           
	
	)

