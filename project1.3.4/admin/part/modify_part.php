<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	$partid = $_GET['pid'];
	$sql = "select id,pname,addtime from part where id = '{$partid}' ";
	$res = mysql_query($sql);
	if($res && mysql_num_rows($res)){
		$partinfo = mysql_fetch_assoc($res);	
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
			<td width="99%" align="left" valign="top">您的位置:分区管理&nbsp;&nbsp;>&nbsp;&nbsp;修改分区</td>
		</tr>
		<tr>
			<td align="left" valign="top" id="addinfo">
			<a href="./add_part.html" target="mainFrame" onFocus="this.blur()" class="add">新增分区</a>
			</td>
		</tr>
		<tr>
		<td align="left" valign="top">
			<form method="post" action="./do_modify_part.php">
				<input type = 'hidden' name = 'partid' value = "<?php echo $partinfo['id']?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">分区名字</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="pname" value="<?php  echo $partinfo['pname']?>" class="text-word">
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