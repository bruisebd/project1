<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//接收分区id  版块名称 写入到版块表中

	$partid = $_POST['partid'];
	$catename = $_POST['catename'];
	$addtime = time();

	$sql = "insert into cate(pid,name,addtime) values('{$partid}','{$catename}','{$addtime}')";

	if(!empty($catename)){
		if(mysql_query($sql)){
			echo '<script>alert("添加版块成功");window.location.href="cate_list.php";</script>';
		}else{
			echo '<script>alert("添加版块失败");window.location.href="add_cate.php";</script>';
		}
		mysql_close();

	}else{
		echo '<script>alert("添加版块失败,板块名不能为空！");window.location.href="add_cate.php";</script>';
		
	}


?>