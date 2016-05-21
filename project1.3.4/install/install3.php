<meta charset="utf-8">
<form action="installok.php" method="post">
	<table >
	<tr>
		<td>主机名称:</td>
		<td><input type="text" name="DB_HOST" value="localhost"></td>
	</tr>
	<tr>
		<td>数据库用户名：</td>
		<td><input type="text" name="DB_USER" value="root"></td>
	</tr>
	<tr>
		<td>数据库密码</td>
		<td><input type="text" name="DB_PASS"></td>
	</tr>
	<tr>
		<td>数据库名：</td>
		<td><input type="text" name="DB_NAME"></td>
	</tr>
	<tr>
		<td>数据库编码：</td>
		<td><input type="text" name="DB_CHARSET" value="utf8"></td>
	</tr>
	<tr>
		<td>管理员名名称：</td>
		<td><input type="text" name="auser" value="admin"></td>
	</tr>
	<tr>
		<td>管理员密码：</td>
		<td><input type="password" name="apwd"></td>
	</tr>	
	<tr>
		<td>确认密码：</td>
		<td><input type="password" name="arepwd"></td>
	</tr>	
	<tr>
		<td><input type="submit" value="点击安装"></td>
		<td></td>
	</tr>	
	</table>


</form>