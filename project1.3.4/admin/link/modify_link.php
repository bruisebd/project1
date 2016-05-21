<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	$linkid = $_GET['linkid'];
	$sql = "select id,title,descript,url,pic from link where id = '{$linkid }'";
	$res = mysql_query($sql);
	$linkinfo = mysql_fetch_assoc($res);

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
			<td width="99%" align="left" valign="top">您的位置:友情链接管理&nbsp;&nbsp;>&nbsp;&nbsp;编辑链接</td>
		</tr>
		<tr>
			<td align="left" valign="top" id="addinfo">
			<a href="./add_cate.html" target="mainFrame" onFocus="this.blur()" class="add">新增链接</a>
			</td>
		</tr>
		<tr>
		<td align="left" valign="top">
			<form method="post" action="./do_modify_link.php" enctype="multipart/form-data">
			<input type = 'hidden' name = 'linkid' value = "<?php  echo $linkinfo['id']?>">
			<input type="hidden" name="oldpic" value="<?php echo $linkinfo['pic'];?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">链接名字</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="linkname" value="<?php echo $linkinfo['title']?>" class="text-word">
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">URL</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="url" value="<?php echo $linkinfo ['url']?>" class="text-word">
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">logo</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="file" name="pic" value = 'aaaa'  >   <image src = "../link_logo_upload/<?php echo $linkinfo ['pic']?>">
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">描述</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						
						<input type="text" name="linkdesc" value="<?php echo $linkinfo ['descript']?>" class="text-word">
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