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
	$sql = "SELECT id,uid,pid,content,re_time from  reply  where id = '{$pid}'";
	$res = mysql_query($sql);
	if($res && mysql_num_rows($res)){
		$replyinfo = mysql_fetch_assoc($res);	
	}
	//从user 表中查出 发帖人的username
	$usersql = "select username from user where id = '{$replyinfo['uid']}'";
	$userres = mysql_query($usersql);
	
	if($userres && mysql_num_rows($userres)){
		$userinfo = mysql_fetch_assoc($userres);	
	}
	
	// 从 post中查出 title
	$postsql = "select title from post where id = '{$replyinfo['pid']}'";
	$postres = mysql_query($postsql);
	if($postres && mysql_num_rows($postres)){
		$postinfo = mysql_fetch_assoc($postres);	
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
			<td width="99%" align="left" valign="top">您的位置:回帖管理&nbsp;&nbsp;>&nbsp;&nbsp;修改回贴</td>
		</tr>
		<tr>
		<td align="left" valign="top">
			<form method="post" action="./do_modify_reply.php">
				<input type = 'hidden' name = 'pid' value = "<?php echo $replyinfo['id']?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
					
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">发帖人</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="title" value="<?php  echo $userinfo['username']?>" disabled class="text-word">
						&nbsp;&nbsp;不可以修改！
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">主贴标题</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="title" value="<?php  echo $postinfo['title']?>" disabled class="text-word">
							&nbsp;&nbsp;不可以修改！
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">主贴内容名字</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<textarea  style="resize:none" name = 'content' rows = '5' cols = '33'>
							<?php  
								echo $replyinfo['content'];
							?>
						</textarea>
						
						</td>
					</tr>
					
<?php 
	mysql_free_result($res);
	mysql_free_result($userres);
	mysql_free_result($postres);
	mysql_close();
?>
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