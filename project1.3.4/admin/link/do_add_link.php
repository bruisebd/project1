<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//接收分区id  版块名称 写入到版块表中
	$linkname = $_POST['linkname'];
	$url = $_POST['url'];
	$pic = $_POST['pic'];
	$linkdesc = $_POST['linkdesc'];
	$addtime = time();
	$pattern= '/(https?|ftps?):\/\/(www|mai	l|bbs|ftp)\.(.*?)\.(net|com|org|cn)([\w-\.\/\=\?\&\%]*)?/';
	if(!preg_match($pattern,$url)){
		echo '<script>alert("链接地址格式不正确，请重新输入");window.location.href="add_link.php";</script>';
		exit;
	}
	if(!empty($linkname)){
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
		//插入link 语句
		$sql = "insert into link(title,descript,add_time,url,pic) values('{$linkname}','{$linkdesc}','{$addtime}','{$url}','{$pic}')";	

		if(mysql_query($sql)){
			echo '<script>alert("链接添加成功");window.location.href="link_list.php";</script>';
		}else{
			echo '<script>alert("链接添加失败");window.location.href="add_link.php";</script>';
		}
		mysql_close();

	}else{
		echo '<script>alert("添加版块失败,板块名不能为空！");window.location.href="add_link.php";</script>';
		
	}


?>