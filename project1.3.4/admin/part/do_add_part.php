<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//接收分区名称 写入到分区表中
	$pname = $_POST['pname'];
	$addtime = time();
	$search = "select pname from part where pname ='{$pname}'";
	$searchres = mysql_query($search);
	if(!empty($pname)){
		//判断分区名是否存在
		if( mysql_num_rows($searchres)){
			//插入分区名sql
			echo '<script>alert("分区名已经存在，请重新添加！");window.location.href="./add_part.php";</script>';
			mysql_free_result($searchres);
			
		}else{
			//echo '<script>alert("分区名已经存在，请重新添加！");window.location.href="./add_part.php";</script>';
			$sql = "insert into  part(pname,addtime) values('{$pname}','{$addtime}')";
			$res = mysql_query($sql);
			if($res){
				echo '<script>alert("添加分区成功");window.location.href="./part_list.php";</script>';
			}else{
				echo '<script>alert("添加分区失败");window.location.href="./add_part.php";</script>';
			}
		
		}
	}else{
	
		echo '<script>alert("分区名不能为空！");window.location.href="./add_part.php";</script>';
	
	}

	mysql_close();

?>