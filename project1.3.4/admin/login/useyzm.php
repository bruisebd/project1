<?php
//必须开启
session_start();
//包含函数库文件 
include '../../public/func.inc.php';
//调用验证码函数
$str = yzm();
//将值存储到session中
$_SESSION['yzm'] = $str;

?>