<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//要修改的 cate id
	//var_dump($_POST);
	$partid = $_POST['pid'];
	$postname = $_POST['title'];
	$postcontent = $_POST['content'];
	
	//板块名字不可以重复
	$quchong  = "select count(*) as count from post where title = '{$postname}' and id != '{$partid}'";
	$quchongres = mysql_query($quchong);
	$flag = mysql_fetch_assoc($quchongres); //'count' => string '0' (length=1)
	if($flag['count']){
		echo '<script>alert("主帖修改失败，帖子名字不能重复!");window.location.href="modify_post.php?pid = '.$partid.'";</script>';
		exit;
		}else{
			//修改语句
			$sql = "update post set title = '{$postname}',content = '{$postcontent}' where id = '{$partid}'";
			
			//判断是不是空的 板块名字
			if(!empty($postname)){
				$res = mysql_query($sql);
				if($res){
					echo '<script>alert("主贴修改成功");window.location.href="post_list.php";</script>';
				}else{
				//失败跳转回修改页
					echo '<script>alert("主贴修改失败");window.location.href="modify_post.php?pid='.$partid.'";</script>';
				}
			mysql_close();

			}else{
				echo '<script>alert("主贴名不能为空!");window.location.href="modify_post.php?pid='.$partid.'";</script>';
					
			}			
				
		}
		

		


	?>