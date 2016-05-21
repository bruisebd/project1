<?php
//包含网站配置信息
include '../../public/bbsconfig.php';
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
			<td width="99%" align="left" valign="top">您的位置:论坛配置管理&nbsp;&nbsp;>&nbsp;&nbsp;配置管理</td>
		</tr>
		<tr>
			
	
		</tr>
		<tr>
		<td align="left" valign="top">
			<form method="post" action="./do_edit.php" enctype="multipart/form-data">
				<input type="hidden" name="WZ_LOGO" value="<?php echo WZ_LOGO;?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">网站名称</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="WZ_NAME" value="<?php echo WZ_NAME;?>" class="text-word">
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">网站关键字</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="WZ_KEYWORDS" value="<?php echo WZ_KEYWORDS;?>" class="text-word">
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">网站版权</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="WZ_COPY" value="<?php echo WZ_COPY;?>" class="text-word">
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">网站开关</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="WZ_KG" value="on" <?php echo (WZ_KG == 'on') ? 'checked' : ''; ?>>&nbsp;&nbsp;&nbsp;&nbsp;开
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="WZ_KG" value="off" <?php echo (WZ_KG == 'off') ? 'checked' : ''; ?>>&nbsp;&nbsp;&nbsp;&nbsp;关
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">网站LOGO</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="file" name="logo" value="<?php echo WZ_NAME;?>" class=""> <img src="../../home/images/<?php echo WZ_LOGO;?>">
						</td>
					</tr>

					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input name="" type="submit" value="提交" class="text-but">
					</tr>
				</table>
			</form>
		</td>
		</tr>
	</body>
</html>