<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
   protected $_validate = array(
   
    array('username','require','未填写用户名'), 
array('username','/^[a-zA-Z0-9]+$/','用户名只允许英语字母和数字',2,regex,1), 





	array('password','require','未填写密码'), 


	 array('email','email','邮箱格式错误！'), //默认情况下用正则进行验证
     array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	     array('password','6,20','请输入6到20个字符的密码！',0,'length',1), // 密码长度
	 
   //  array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
   //  array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
   //  array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
   );
   
    protected $_auto = array ( 
       /*   array('status','1'),  // 新增的时候把status字段设置为1 */
         array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
       /*   array('name','getName',3,'callback'), // 对name字段在新增和编辑的时候回调getName方法
         array('update_time','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳 */
     );
   
}