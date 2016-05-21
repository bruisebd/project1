<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();

	//exit;
	//接收数据  添加到用户表中
	$user = $_POST['username'];
	$pwd = $_POST['pwd'];
	$repwd = $_POST['repwd'];
	$email = $_POST['email'];
	$qx = $_POST['level'];


	//用户名长度不能小于3
	if(strlen($user) < 3){
		echo '<script>alert("用户名长度不能小于3");window.location.href="main_info.php";</script>';
		exit;
	}

	//两次密码得一致  加密写入到表中
	if($pwd != $repwd){
		echo '<script>alert("两次密码不一致，请重新输入");window.location.href="main_info.php";</script>';
		exit;
	}else{
		$pass = md5($pwd);
	}

	//验证邮箱格式
	$pattern = '/^\w+@\w+(\.\w+){1,3}$/';
	if(!preg_match($pattern,$email)){
		echo '<script>alert("邮箱格式不正确");window.location.href="main_info.php";";</script>';
		exit;
	}

	//注意时区
	$rtime = time();	
	//获取客户端IP ip2long 将ip转成整型  long2ip
	$rip = ip2long($_SERVER['REMOTE_ADDR']);// ::1  127.0.0.1
	
	//验证名用户是否存在
	$yzsql = "select username  from user where username = '{$user}'";
	$yzres = mysql_query($yzsql);
	//exit($yzsql);
	if( $yzres && mysql_num_rows($yzres)){
		echo '<script>alert("用户名存在，请重新填写用户名！");window.location.href="./main_info.php";</script>';
		exit;	
	
	}	
	
	//数据都验证过后  写入到用户表中
	$sql = "insert into user(username,password,email,level,rtime,rip) values('{$user}','{$pass}','{$email}','{$qx}','{$rtime}','{$rip}')";
	
	
	$res =mysql_query($sql);
	if($res && mysql_affected_rows()){
		echo '<script>alert("添加成功");window.location.href="./main_list.php";</script>';
		exit;
	}else{
		echo '<script>alert("添加失败");window.location.href="main_info.php";</script>';
		exit;
	}

	//关闭连接
	mysql_close();
?>