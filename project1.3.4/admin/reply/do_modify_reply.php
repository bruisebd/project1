<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//要修改的 cate id

	$replyid = $_POST['pid'];
	$replycontent = $_POST['content'];
	
	//修改语句
	$sql = "update reply set content = '{$replycontent}' where id = '{$replyid}'";
	$res = mysql_query($sql);
	if($res){
			echo '<script>alert("主贴修改成功");window.location.href="reply_list.php";</script>';
		}else{
		//失败跳转回修改页
			echo '<script>alert("主贴修改失败");window.location.href="reply_list.php?pid='.$partid.'";</script>';
		}
	mysql_close();
	

				
		
		

		


	?>