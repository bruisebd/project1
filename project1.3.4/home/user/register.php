<?php
	include "./header.php";
?>		
		<link href = "../css/register.css" rel = "stylesheet">
		
		<!--body 的开始-->
		<div id  = "body">
			<div class = "bodytitle">
				<div class = "btitleleft"><a href = ''>&nbsp;立即注册</a></div>
				<div class = "btitleright"><a href = "" class = "zc">已有账号？现在登录</a></div>
			</div>
			<div class = "bmain">
				<form action = "./login/do_register.php" method = "post" >
					<table cellspacing = "1">
						<tr class = "tr">
							<td>用户名：</td>
							<td><input type = "text" name = "username" class = "wb"></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
						</tr>
						<tr class = "tr">
							<td>密码：</td>
							<td><input type = "password" name = "pwd" class = "wb" ></td>
							<td><td>
						</tr>
						<tr class = "tr">
							<td>确认密码：</td>
							<td><input type = "password" name = "repwd" class = "wb"></td>
							<td><td>
						</tr>
						<tr class = "tr">
							<td>E-mail:</td>
							<td><input type = "text" name = "email" class = "wb"></td>
							<td><td>
						</tr>
						<tr class = "tr">
							<td colspan = "2"><input type = "submit" value = "提交">&nbsp;&nbsp;
								<input type = "reset" value = "重置"></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						</tr >
					</table>
				</form>
			</div>	
		</div>
		<!--body 的结束-->
		<!-- footer 的开始-->
<?php
	include "footer.php";
?>