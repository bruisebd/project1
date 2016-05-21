<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="../css/css.css" type="text/css" rel="stylesheet" />
<link href="../css/main.css" type="text/css" rel="stylesheet" />
<link href="../css/main_list.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="../images/main/favicon.ico" />
<style>

</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理&nbsp;&nbsp;>&nbsp;&nbsp;添加用户</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="./doadd.php">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
		  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
			<td align="right" valign="middle" class="borderright borderbottom bggray">用户名：</td>
			<td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="text" name="username"  value = '' class="text-word">
			</td>
		  </tr>
		  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
			<td align="right" valign="middle" class="borderright borderbottom bggray">用户密码：</td>
			<td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="password" name="pwd"  value = '' class="text-word">
			</td>
			</tr>
		  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
			<td align="right" valign="middle" class="borderright borderbottom bggray">确认密码：</td>
			<td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="password" name="repwd" value="" class="text-word">
			</td>
		  </tr>
		  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
			<td align="right" valign="middle" class="borderright borderbottom bggray">email：</td>
			<td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="email" name="email"  value = '' class="text-word">
			</td>
		  </tr>
		  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
			<td align="right" valign="middle" class="borderright borderbottom bggray">用户权限：</td>
			<td align="left" valign="middle" class="borderright borderbottom main-for">
			<select name="level" id="level">
			<option value="0" >&nbsp;&nbsp;管理员</option>
			<option value="2" >&nbsp;&nbsp;会员</option>
			<option value="1" >&nbsp;&nbsp;版主</option>
			</select>
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
</table>
</body>
</html>