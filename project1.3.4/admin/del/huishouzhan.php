<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	

	$sql = "select * from post where id = {$_GET['id']} and del = 1";
	$res = mysql_query($sql);
	$info  = mysql_fetch_assoc($res);
	$del = $info['del'];
	if($del == 1){ //del 1 为已经置顶的帖子   0 
		
		$qxsql = "update post set del = 0 , paixu = 0 where id = {$_GET['id']}";
		$res = mysql_query($qxsql);
		if($res){
		
			echo "<script>alert('恢复成功');window.location.href='../post/post_list.php?&cid={$_GET['cid']}';</script>";
	
		}
	}else{
	
		$zdsql = "update post set del = 1 , paixu = 999 where id = {$_GET['id']}";
		//exit($zdsql);
		$res = mysql_query($zdsql);
		if($res){
			echo "<script>alert('放入回收站成功');window.location.href='../post/post_list.php?&cid={$_GET['cid']}';</script>";
	
		}
		
	}
	

?>