<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理登录界面</title>
    <link href="../css/alogin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form id="form1" runat="server" action="dolog.php" method="post">
    <div class="Main">
        <ul>
            <li class="top"></li>
            <li class="top2"></li>
            <li class="topA"></li>
            <li class="topB">
		
			用户名<input id="Text1" class="txt" type = 'text' name = 'username' ><br><br>
			密&nbsp;&nbsp;&nbsp;码<input id="Text1" class="txt" type = 'password' name = 'pwd' ><br><br>
			验证码<input id="Text1" class="txt" type = 'text' name = 'code' ><br><br>

			</li>
            <li class="topC"></li>
            <li class="topD"><br><br><br><br><br><br>
				
				<img src="./useyzm.php">
				
			</li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C"><span class=""><input name="" type="image" src="../images/login/btnlogin.gif" /></span></li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B">网站后台管理系统&nbsp;&nbsp;www.php.com</li>
        </ul>
    </div>
    </form>
</body>
</html>