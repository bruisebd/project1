<?php
	header('Content-type:text/html;charset=utf-8');
//包含数据库配置文件
	include '../../public/dbconfig.php';
//包含函数库文件
	include '../../public/func.inc.php';
//调用连接函数
	conn();
	//要修改的 cate id

	$cateid = $_POST['cateid'];
	$catename = $_POST['catename'];
	$partid = $_POST['partid'];
	
	/*
	array (size=3)
  'cateid' => string '30' (length=2)
  'catename' => string '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊' (length=60)
  'partid' => string '5' (length=1)
	
	*/
	//板块名字不可以重复
	
	$quchong  = "select count(*) as count from cate where name = '{$catename}' and id != '{$cateid}'";
	$quchongres = mysql_query($quchong);
	$flag = mysql_fetch_assoc($quchongres); //'count' => string '0' (length=1)
	if($flag['count']){
		echo '<script>alert("版块修改失败，板块名字不能重复!");window.location.href="modify_cate.php?cid = '.$cateid.'";</script>';
		exit;
		}else{
			//修改语句
			$sql = "update cate set pid = '{$partid}',name = '{$catename}' where id = '{$cateid}'";
			
			//判断是不是空的 板块名字
			if(!empty($catename)){
				$res = mysql_query($sql);
				if($res){
					echo '<script>alert("版块修改成功");window.location.href="cate_list.php";</script>';
				}else{
				//失败跳转回修改页
					echo '<script>alert("版块修改失败");window.location.href="mydify_cate.php?cid='.$cateid.'";</script>';
				}
			mysql_close();

			}else{
				echo '<script>alert("板块名不能为空!");window.location.href="add_cate.php?cid='.$cateid.'";</script>';
					
			}			
				
		}
		

		


	?>