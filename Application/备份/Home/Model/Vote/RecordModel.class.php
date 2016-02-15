<?php
namespace Home\Model;
use Think\Model;
class RecordModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('optionno','require','没有点击选项'),
	
        );
	
}