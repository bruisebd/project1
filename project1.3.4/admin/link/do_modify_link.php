<?php
	header('Content-type:text/html;charset=utf-8');
//包含数据库配置文件
	include '../../public/dbconfig.php';
//包含函数库文件
	include '../../public/func.inc.php';
//调用连接函数
	conn();
	//要修改的 cate id
	/*
	array (size=4)
	  'linkid' => string '15' (length=2)
	  'linkname' => string 'asdf' (length=4)
	  'url' => string 'http://www.baidu.com' (length=20)
	  'linkdesc' => string 'afs' (length=3)
	*/
	//4 没有文件被上传
	
	if($_FILES['pic']['error'] != 4){
	//有文件上传 需要调用上传函数
		$upinfo = upload('pic','../link_logo_upload/'); /*array (size=2)
													'info' => string '14437628251263.jpg' (length=18)
													'error' => boolean true*/
		if($upinfo['error']){
			//上传成功
			$pic = $upinfo['info'];
			//调用图像缩放  缩放成功后 需要删除原图像unlink(图像路径)  default.jpg(默认头像)
			$pic = suofang('../link_logo_upload/'.$pic,69,62,"lideqiang_");
			unlink('../link_logo_upload/'.$upinfo['info']);
			
		}else{
			//上传失败
			echo '上传失败原因是：'.$upinfo['info'];
		}
	}else{
		//没有文件上传  获取原图像
		$pic = $_POST['oldpic'];
	}	
	
	
	$linkid = $_POST['linkid'];
	$linkname = $_POST['linkname'];
	$url = $_POST['url'];
	$linkdesc = $_POST['linkdesc'];
	
	
	$quchong  = "select count(*) as count from link where title = '{$linkname}' and id != '{$linkid}'";
	$quchongres = mysql_query($quchong);
	$flag = mysql_fetch_assoc($quchongres); //'count' => string '0' (length=1)
	if($flag['count']){
		echo '<script>alert("链接修改失败，链接名字不能重复!");window.location.href="modify_link.php";</script>';
		exit;
		}else{
			//修改语句
			$sql = "update link set pic = '{$pic}',title = '{$linkname}',url = '{$url}' ,descript = '{$linkdesc}' where id = '{$linkid}'";
			
			//判断是不是空的 板块名字
			if(!empty($linkname)){
				$res = mysql_query($sql);
				if($res){
					echo '<script>alert("链接修改成功");window.location.href="link_list.php";</script>';
				}else{
				//失败跳转回修改页
					echo '<script>alert("链接修改失败");window.location.href="modify_link.php?linkid='.$linkid.'";</script>';
				}
			mysql_close();

			}else{
				echo '<script>alert("链接名不能为空!");window.location.href="modify_link.php?linkid='.$linkid.'";</script>';
					
			}			
				
		}
		

		


	?>