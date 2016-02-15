<?php
return array(
	//'配置项'=>'配置值'
	
'DB_TYPE' => 'mysql', // 数据库类型
'DB_HOST' => 'localhost', // 服务器地址
'DB_NAME' => 'mysql', // 数据库名
'DB_USER' => 'root', // 用户名
'DB_PWD' => '', // 密码
'DB_PORT' => 3306, // 端口
'DB_PREFIX' => 'vote_', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增



'MODULE_ALLOW_LIST' => array (
                'Home',
                'Admin',
                'User' 
        ),

'DEFAULT_MODULE' => 'Home' ,
'LAYOUT_ON'=>true,


'SESSION_TYPE' => 'db',
'SESSION_TABLE' =>'think_session',


	//***********************************SESSION设置**********************************
    'SESSION_OPTIONS'         =>  array(
            'type'=>'db',

        'name'                =>  'USERNAME',                    //设置session名
        'expire'              =>  55,                      //SESSION保存15天
        'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),
	
		//***********************************SESSION设置**********************************
    'SESSION_OPTIONS'         =>  array(
            'type'=>'db',

        'name'                =>  'USERID',                    //设置session名
        'expire'              =>  1800,                      //SESSION保存15天
        'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),
	   

);


