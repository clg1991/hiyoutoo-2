<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller{
	public function search(){
		     /*  $Index=new IndexController;
				$Index->userexpire(); */
	 	$Content = M("Content");   
                
				     $maxvoteno  = $Content->max('voteno'); 
					
        

		for ($i=0; $i<=$maxvoteno+1; $i++)
		{
			$record   =  M('record');
		
		     $data['username'] = session('username');
			   $data['voteno'] = $i;
			   
			   $voted = $record->where($data)->find();
			if(  $voted ) //判断是否已经投票
			{ 
			        
			     $optionno=$record->where($data)->getField('optionno');
				
				
				 $dataa['voteno']=$i;
				 
				 $dataa['optionno']=$optionno;

				 $aa=session('username');
				$dataa['username']  = array('NEQ',session('username'));
			
                if( 	$datab= $record->where($dataa)->field('username')->select())
				{
		
		                 
		                  $databi=0;
						 
			          	while($datab[$databi][username]) 
							
                           { 
						           $tongjiusername=$datab[$databi][username];
						          $tongji[$tongjiusername]++;
								  
                                
								$databi++;
                           } 
					   
arsort($tongji);
				    $this->assign('list',$tongji);
				
				
				 }
				 
			}
			     
				      
				 
			   
			   
		}  
	
  		    
           
          $this->display();
	
		
		
		
	
	  }
	  
	  }
	  
	  
	  
	  
	  ?>