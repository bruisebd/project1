<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//接收分区名称 写入到分区表中
	$cid = $_POST['cid'];
	$uid = $_POST['uid'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$addtime = time();
	$sql = "insert into post(cid,uid,title,content,add_time) values('{$cid}','{$uid}','{$title}','{$content}','{$addtime}')";
	if(!empty($title)){
		//判断分区名是否存在
		$search = "select title from post where title ='{$title}'";
		$searchres = mysql_query($search);
		if( mysql_num_rows($searchres)){
			//插入分区名sql
			echo '<script>alert("标题名已经存在，请重新添加！");window.location.href="./fatie.php";</script>';
			mysql_free_result($searchres);
			
		}else{
			//echo '<script>alert("分区名已经存在，请重新添加！");window.location.href="./add_part.php";</script>';
			$sql = "insert into post(cid,uid,title,content,add_time) values('{$cid}','{$uid}','{$title}','{$content}','{$addtime}')";
			$res = mysql_query($sql);
			if($res){
				echo "<script>alert('发帖成功');window.location.href='./list.php?cid={$cid}';</script>";
			}else{
				echo '<script>alert("发帖失败");window.location.href="./fatie.php";</script>';
			}
		
		}
	}else{
	
		echo '<script>alert("标题名不能为空！");window.location.href="./fatie.php";</script>';
	
	}

	mysql_close();

?>