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
			<td width="99%" align="left" valign="top">您的位置:友情链接管理&nbsp;&nbsp;>&nbsp;&nbsp;添加链接</td>
		</tr>
		<tr>
			<td align="left" valign="top" id="addinfo">
			<a href="./add_cate.html" target="mainFrame" onFocus="this.blur()" class="add">新增链接</a>
			</td>
		</tr>
		<tr>
		<td align="left" valign="top">
			<form method="post" action="./do_add_link.php" enctype="multipart/form-data">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">链接名字</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="linkname" value="" class="text-word">
						</td>
						
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">URL</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="url" value="" class="text-word">&nbsp;&nbsp;<span>例如：http://www.baidu.com</span> 
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">logo</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="file" name="pic" value="" >
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">描述</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						
						<input type="text" name="linkdesc" value="" class="text-word">
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