<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//var_dump(conn());  uid  回帖人  pid 发帖人 
	$sql = "SELECT id,uid,pid,content,re_time from reply";
	$res  = mysql_query($sql);
	 
?>	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>主要内容区main</title>
			<link href="../css/css.css" type="text/css" rel="stylesheet" />
			<link href="../css/main.css" type="text/css" rel="stylesheet" />
			<link href="../css/reply_list.css" type="text/css" rel="stylesheet" />
			<link rel="shortcut icon" href="../images/main/favicon.ico" />
	</head>
<body>
<!--main_top-->
<form method="post" action="./del.php">
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top" id="addinfo">您的位置:回帖管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
			<tr>
				<th align="center" valign="middle" class="borderright tda">回帖ID</th>
				<th align="center" valign="middle" class="borderright tda">发帖人</th>
				<th align="center" valign="middle" class="borderright tda">回帖人</th>
				<th align="center" valign="middle" class="borderright">回帖内容</th>
				<th align="center" valign="middle" class="borderright">回帖时间</th>
				<th align="center" valign="middle" class="borderright">操作</th>
			</tr>
		  <?php
		  if($res && mysql_num_rows($res)){ 
			while($rinfo  = mysql_fetch_assoc($res)){
			
				
				//从user 表中查出 回帖人的username
				$usersql = "select username from user where id = '{$rinfo['uid']}'";
				$userres = mysql_query($usersql);
				$userinfo = mysql_fetch_assoc($userres);	
				
				//从user 表中查出 发帖人的username
				$pusersql = "select username from user where id = '{$rinfo['pid']}'";
				$puserres = mysql_query($pusersql);
				$puserinfo = mysql_fetch_assoc($puserres);	
				
				
		  ?>
			<tr class="bggray">
				<td align="center" valign="middle" class="borderright borderbottom">
				<input type = 'checkbox' name = 'cid[]' value = '<?php echo $rinfo['id']; ?>'>
				<?php echo $rinfo['id'] ?>
					</td>
				<td align="left" valign="middle" class="borderright borderbottom tdb"><?php echo $puserinfo['username'] ?></td>
				<td align="center" valign="middle" class="borderright borderbottom"><?php echo $userinfo['username'] ?></td>
				<td align="left" valign="middle" class="borderright borderbottom tdb"><?php echo $rinfo['content'] ?></td>
				<td align="left" valign="middle" class="borderright borderbottom tdb"><?php echo $rinfo['re_time'] ?></td>
				<td align="center" valign="middle" class="borderbottom">
					<a href="modify_reply.php?pid=<?php echo $rinfo['id'] ?>" target="mainFrame" onFocus="this.blur()" class="add">修改</a><span class="gray">&nbsp;|&nbsp;</span>
					<a href="del.php?cid= <?php echo $rinfo['id']?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
			</tr>
			
			<?php
			}
			}
			?>
		  
		</table>
	</td>
    </tr>
  <tr>
    <td align="left" valign="top" id="xiugai"><input name="" type="submit" value="批量删除" class="text-but"></td>
  </tr>
</table>
</form>
</body>
</html>