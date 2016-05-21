<?php
header('Content-type:text/html;charset=utf-8');

//接收数据库信息  覆盖数据库配置文件  拼接字符串 使用file_put_contents重写配置文件

//var_dump($_POST);

$str = "<?php\n";
foreach($_POST as $k=>$v){
	//如果下标是 auser 退出循环
	if($k == 'auser'){
		break;
	}
	$str .= "define('{$k}','{$v}');\n";
}
$str .= "?>";

//var_dump($str);


if(file_put_contents('../public/dbconfig.php',$str)){
	//配置文件改写成功
	//连接数据库服务器  建库  建表
	//包含数据库配置文件
	include '../public/dbconfig.php';
	$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);
	//var_dump($link);
	
	$dbsql = "create database ".DB_NAME;
	$dbres = mysql_query($dbsql);
	
	//var_dump($dbres);
	if($dbres){
		//建库成功
		//选择数据库  建表
		mysql_select_db(DB_NAME);
		mysql_set_charset(DB_CHARSET);
		
		//导出数据库  表结构
		//把表结构文件 读进来  使用分号进行分割 
		$sqlstr = file_get_contents('./one_project.sql');
		$sqlarr = explode(';',$sqlstr);
		//var_dump($sqlarr);
		array_pop($sqlarr);
		//var_dump($sqlarr);
		
		foreach($sqlarr as $k => $v){
			if(mysql_query($v)){
				echo '第'.($k+1).'个表创建成功<br>';
			}else{
				echo '第'.($k+1).'个表创建失败<br>';
			}
		}
		
		//将默认数据写入数据表中
		if($_POST['apwd'] != $_POST['arepwd']){
			
		}else{
			$pass = md5($_POST['arepwd']);
		}
		$rtime = time();
		$rip = ip2long($_SERVER['REMOTE_ADDR']);
		
		$asql = "insert into user(username,password,email,level,rtime,rip) values('{$_POST['auser']}','{$pass}','admin@admin.com',0,'{$rtime}','{$rip}')";
		
		mysql_query($asql);
		
		//echo $asql;
		
		
		
		//生成文件锁
		file_put_contents('./install.lock','');
		
		echo '<script>alert("安装成功,跳转到首页");window.location.href="../home/user/index.php";</script>';
		
	}else{
		echo '建库失败';
	}
}else{
	echo '配置文件改写失败';
}




?>