<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//接收回帖的名称 写入到回帖表中
	$pid = $_POST['pid'];
	$uid = $_POST['uid'];
	$cid = $_POST['cid'];
	$content = $_POST['content'];
	$re_time = time();
	$sql = "insert into reply(uid,pid,content,re_time) values('{$uid}','{$pid}','{$content}','{$re_time}')";
	//判断内容是否空
	if(!empty($content)){
		$res = mysql_query($sql);
		if($res){
			
			echo "<script>alert('回复成功');window.location.href='./detail.php?pid={$pid}';</script>";
					
		}
		
	}else{
	
				echo "<script>alert('回复内容部能为空');window.location.href='./detail.php?pid={$pid}';</script>";
					
	}

	mysql_close();

?>