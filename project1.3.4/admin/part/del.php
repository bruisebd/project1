<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数\
	conn();
	$cid = $_REQUEST['cid'];
	if(!isset($cid)){
		echo '<script>alert("没有要删除的数据");window.location.href="./part_list.php";</script>';
		exit;
	}
	if(is_array($cid)){
		$cid = implode(',',$cid);
	}
	$catesql = "select count(*) c from cate where pid in ({$cid})";
	$res= mysql_query($catesql);
	$count = mysql_fetch_assoc($res);
	if($count['c'] >0){
		echo '<script>alert("分区中存在板块，无法删除！");window.location.href="./part_list.php";</script>';
		exit;
	}
	$sql = "delete from part where id in ({$cid})";
	$res = mysql_query($sql);
	if($res){
		echo '<script>alert("删除成功");window.location.href="./part_list.php";</script>';
	}else{
		echo '<script>alert("删除失败");window.location.href="./part_list.php";</script>';
	}
	mysql_close();








?>