<?php
	header('Content-type:text/html;charset=utf-8');
//包含数据库配置文件
	include '../../public/dbconfig.php';
//包含函数库文件
	include '../../public/func.inc.php';
//调用连接函数
	conn();
	
	$uid = $_POST['uid'];
	
//用户表
//头像  如果用户没有上传头像  则使用原头像  如果用户上传了 则使用上传头像 
//4 没有文件被上传
	if($_FILES['pic']['error'] != 4){
//有文件上传 需要调用上传函数
		$upinfo = upload('pic','../../uploads/'); /*array (size=2)
													'info' => string '14437628251263.jpg' (length=18)
													'error' => boolean true*/
		if($upinfo['error']){
			//上传成功
			$pic = $upinfo['info'];
			//调用图像缩放  缩放成功后 需要删除原图像unlink(图像路径)  default.jpg(默认头像)
			$pic = suofang('../../uploads/'.$pic,69,62,"lideqiang_");
			unlink('../../uploads/'.$upinfo['info']);
			
		}else{
			//上传失败
			echo '上传失败原因是：'.$upinfo['info'];
		}
	}else{
		//没有文件上传  获取原图像
		$pic = $_POST['oldpic'];
	}


	$qx = $_POST['level'];
	$email = $_POST['email'];

	//用户详情表
	$t_name = $_POST['t_name'];
	//如果没有填写性别 给默认值  1 男
	if(isset($_POST['sex'])){
		$sex = $_POST['sex'];
	}else{
		$sex = 1;
	}

	$y = $_POST['y'];
	$m = $_POST['m'];
	$d = $_POST['d'];
	//转成时间戳 存储进去
	$birthday = mktime(0,0,0,$m,$d,$y);

	$edu = $_POST['edu'];
	$tel = $_POST['tel'];
	$address = $_POST['address'];


	//用户表
	$usql = "update user set pic='{$pic}',level='{$qx}',email='{$email}' where id={$uid}";

	//判断详情表中是否有此数据  如果有 则更新  如果没有 则插入
	//根据id去详情表中查询  是否有数据

	$sdsql = "select uid from user_detail where uid={$uid}";
	$sdres = mysql_query($sdsql);
	if($sdres && mysql_num_rows($sdres)){
		// 如果有 则更新
		$dsql = "update user_detail set t_name='{$t_name}',sex='{$sex}',birthday='{$birthday}',edu='{$edu}',tel='{$tel}',address='{$address}' where uid={$uid}";
		mysql_free_result($sdres);
	}else{
		//如果没有 则插入
		$dsql = "insert into user_detail(uid,t_name,sex,birthday,edu,tel,address) values('{$uid}','{$t_name}','{$sex}','{$birthday}','{$edu}','{$tel}','{$address}')";
	}

	/* echo $usql;
	echo '<br>';
	echo $dsql; */

	//执行更新
	$ures = mysql_query($usql);
	$dres = mysql_query($dsql);

	if($ures && $dres){
		//更新成功
		echo '<script>alert("更新成功");window.location.href="./main_list.php";</script>';
	}else{
		//更新失败
		echo '<script>alert("更新失败");window.location.href="./main_list.php";</script>';
	}


	mysql_close();

	?>