<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="../css/css.css" type="text/css" rel="stylesheet" />
<link href="../css/left.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="../images/main/member.gif" width="44" height="44" /></div>
    <span>用户:<?php session_start(); echo $_SESSION['uname']?><br>角色：管理员</span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
		<div class="collapsed">
			<span>回贴管理</span>
			<a href="./reply_list.php" target="mainFrame" onFocus="this.blur()">回贴列表</a>
		</div>
	  
</body>
</html>