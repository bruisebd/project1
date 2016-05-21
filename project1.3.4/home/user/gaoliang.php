<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	$sql = "select * from post where id = {$_GET['id']}";
	$res = mysql_query($sql);
	$info  = mysql_fetch_assoc($res);
	$gaoliang = $info['gaoliang'];
	if($gaoliang == 1){ //sta 1 已经高亮的帖子   0 
		
		$qxsql = "update post set gaoliang =0 where id = {$_GET['id']}";
		$res = mysql_query($qxsql);
		if($res){
		
			echo "<script>alert('取消高亮显示');window.location.href='./list.php?&cid={$_GET['cid']}';</script>";
	
		}
	}else{
	
		$zdsql = "update post set gaoliang = 1  where id = {$_GET['id']}";
		//exit($zdsql);
		$res = mysql_query($zdsql);
		if($res){
			echo "<script>alert('高亮显示成功');window.location.href='./list.php?&cid={$_GET['cid']}';</script>";
	
		}
		
	}
	

?>