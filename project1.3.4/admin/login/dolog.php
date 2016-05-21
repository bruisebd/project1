<?php
	header('Content-type:text/html;charset=utf-8');
	
	//开启session 
	session_start();
	//包含连接文件
	include '../../public/dbconfig.php';
	include '../../public/func.inc.php';
	// 连接数据库的函数
	conn();
	//var_dump($_POST);
	$user = $_POST['username'];
	$pass = md5($_POST['pwd']);
	$code = strtolower($_POST['code']);
	//判断验证码输入正确
	$yzm = strtolower($_SESSION['yzm']);

	if($code != $yzm){
		echo '<script>alert("验证码输入错误");window.location.href="./login.php";</script>';
		exit;
	}
	$sql = "select id,username,password,level from user where username ='{$user}' and password = '{$pass}'";
	$res = mysql_query($sql);
	
	if($res && mysql_num_rows($res)){
		$uinfo = mysql_fetch_assoc($res);
		$_SESSION['uid'] = $uinfo['id'];
		$_SESSION['uname'] = $uinfo['username'];
		$_SESSION['level'] = $uinfo['level'];
		$_SESSION['flag'] = 1;
	
		//echo '<script>alert("登录成功");window.location.href="center.php?'.session_name().'='.session_id().'";</script>';
		echo '<script>alert("登录成功");window.location.href="../index.php?";</script>';
	
		//释放结果集
		mysql_free_result($res);
	}else{
		//登录失败
		echo '<script>alert("输入的用户名或密码不正确");window.location.href="./login.php";</script>';
	
		}

mysql_close();




?>