<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	$pid = $_GET['pid'];
	$sql = "select id,title,content from post where id = '{$pid}' ";
	$res = mysql_query($sql);
	if($res && mysql_num_rows($res)){
		$postinfo = mysql_fetch_assoc($res);	
	}
?>	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>主要内容区main</title>
		<link href="../css/css.css" type="text/css" rel="stylesheet" />
		<link href="../css/add_part.css" type="text/css" rel="stylesheet" />
		<link href="../css/main.css" type="text/css" rel="stylesheet" />
		<link rel="../shortcut icon" href="images/main/favicon.ico" />
	</head>	
	<body>
	<!--main_top-->
	<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
		<tr>
			<td width="99%" align="left" valign="top">您的位置:主贴管理&nbsp;&nbsp;>&nbsp;&nbsp;修改主贴</td>
		</tr>
		<tr>
		<td align="left" valign="top">
			<form method="post" action="./do_modify_post.php">
				<input type = 'hidden' name = 'pid' value = "<?php echo $postinfo['id']?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">主贴名字</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="title" value="<?php  echo $postinfo['title']?>" class="text-word">
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">主贴内容名字</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<textarea  style="resize:none;text-align:left" name = 'content' rows = '5' cols = '33'>
							<?php  
								echo $postinfo['content'];
							?>
						</textarea>
						
						</td>
					</tr>
					

					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input name="" type="submit" value="提交" class="text-but">
						<input name="" type="reset" value="重置" class="text-but"></td>
					</tr>
				</table>
			</form>
		</td>
		</tr>
	</body>
</html>