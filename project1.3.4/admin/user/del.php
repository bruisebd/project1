<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数\
	conn();


	$uid = $_REQUEST['uid'];
	if(!isset($uid)){
		echo '<script>alert("没有要删除的数据");window.location.href="./main_list.php";</script>';
		exit;
	}
	if(is_array($uid)){
		$uid = implode(',',$uid);
	}

	//delete from user where id in(1,2,3);

	$sql = "delete from user where id in ({$uid})";
	

	//关联删除  用户已经被删除  与其相关的网站中所有数据  都需要删除
	
	//用户详情表   发贴表  回贴表
	//关联删除  第二种  根据用户id去查询 此用户是否发过贴子  如果发过贴子 提示不允许删除此用户 

	$dsql = "delete from user_detail where uid in({$uid})";
	$fsql = "delete from post where uid in ({$uid})";
	$hsql = "delete from reply where uid in ({$uid})";

	$res = mysql_query($sql);

	
	$dres = mysql_query($dsql);
	$fres = mysql_query($fsql);
	$hres = mysql_query($hsql);


	if($res && $fres && $hres){
		echo '<script>alert("删除成功");window.location.href="./main_list.php";</script>';
	}else{
		echo '<script>alert("删除失败");window.location.href="./main_list.php";</script>';
	}
	mysql_close();








?>