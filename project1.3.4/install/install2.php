<?php
header('Content-type:text/html;charset=utf-8');
//获取php版本
echo 'PHP版本为'.PHP_VERSION.'<br>';


//判断上传目录是否有写的权限 
if(is_writable('../uploads')){
	echo '对上传目录有可写权限<br>';
}else{
	echo '对上传目录没有可写权限<br>';
}

//判断模块是否支持
if(function_exists('mysql_connect')){
	echo '支持mysql模块<br>';
}else{
	echo '不支持mysql模块<br>';
}

?>
<form action="install3.php">
	<input type="submit" value="下一步">
</form>