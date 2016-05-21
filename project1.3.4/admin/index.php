<?php
	header('Content-type:text/html;charset=utf-8');
//判断用户是否登录后台  并且有权限 
//	level==0 为管理员
	session_start();
	//如果用户没有登录  或者  用户不是管理员权限 
	if($_SESSION['flag'] ==1 ){
		if($_SESSION['leve'] = 0 || $_SESSION['leve'] = 2){
				
		}else{
			echo '<script>alert("您的权限不够！");window.location.href="./login/login.php";</script>';
			exit;			
		}	
	}else{
		echo '<script>alert("你还没有登登录！ ");window.location.href="./login/login.php";</script>';
		exit;
	}
?>
	<html>
	<head>
		<meta  charset = "utf-8" />
		<title>网站后台管理系统</title>
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link href="css/css.css" type="text/css" rel="stylesheet" />
	</head>
	<!--框架样式-->
	<frameset rows="95,*,30" cols="*" frameborder="no" border="0" framespacing="0">
	<!--top样式-->
		<frame src="top.html" name="topframe" scrolling="no" noresize id="topframe" title="topframe" />
	<!--contact样式-->
		<frameset id="attachucp" framespacing="0" border="0" frameborder="no" cols="194,12,*" rows="*">
			<frame scrolling="auto" noresize="" frameborder="no" name="leftFrame" src="left.php"></frame>
			<frame id="leftbar" scrolling="no" noresize="" name="switchFrame" src="swich.html"></frame>
			<frame scrolling="auto" noresize="" border="0" name="mainFrame" src="main.html"></frame>
		</frameset>
	<!--bottom样式-->
		<frame src="bottom.html" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
	</frameset><noframes></noframes>
	<!--不可以删除-->
	</html>