<?php
header('Content-type:text/html;charset=utf-8');
//包含函数库文件
include '../../public/func.inc.php';

//接收修改的配置信息  写入到配置文件中

//判断用户是否修改了网站LOGO  
if($_FILES['logo']['error'] != 4){
	//有文件上传
	//调用 文件上传函数  
	$uparr = upload('logo','../../home/images/');
	if($uparr['error']){
		//成功   调用缩放函数
		$sname = suofang('../../home/images/'.$uparr['info'],130,70);
		$_POST['WZ_LOGO'] = $sname;//成功后将名字 写入 $_POST数组中
		
	}else{
		echo '上传失败原因：'.$uparr['info'];
	}
}
//没有文件上传  通过表单隐藏域 把图像名称传递过来



//拼接配置文件字符串
$str = "<?php\n";

//遍历$_POST数组  
foreach($_POST as $k => $v){
	$str .= "define('{$k}','{$v}');\n";
}

$str .= "?>";

if(file_put_contents('../../public/bbsconfig.php',$str)){
	echo '<script>alert("配置修改成功");window.location.href="./edit_bbs.php";</script>';
}else{
	echo '<script>alert("配置修改失败");window.location.href="edit_bbs.php";</script>';
}


?>