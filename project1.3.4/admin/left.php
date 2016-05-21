<?php
//开启session
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/left.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/sdmenu.js"></script>
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
	<div><img src="../uploads/<?php  echo $_SESSION['pic'] ?>" width="44" height="44" /></div>
    <span>用户：<?php echo $_SESSION['uname'] ;?><br>角色：<?php  echo ($_SESSION['level']==0)?'管理员':'版主';?></span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>用户管理</span>
        <a href="./user/main_list.php" target="mainFrame" onFocus="this.blur()">用户列表</a>
        <a href="./user/main_info.php" target="mainFrame" onFocus="this.blur()">添加用户</a>
      </div>
	  <div class="collapsed">
        <span>分区管理</span>
        <a href="./part/part_list.php" target="mainFrame" onFocus="this.blur()">分区列表</a>
        <a href="./part/add_part.php" target="mainFrame" onFocus="this.blur()">添加分区</a>
      </div>
	 <div class="collapsed">
        <span>板块管理</span>
        <a href="./cate/cate_list.php" target="mainFrame" onFocus="this.blur()">板块列表</a>
        <a href="./cate/add_cate.php" target="mainFrame" onFocus="this.blur()">添加板块</a>
      </div>
	<div class="collapsed">
        <span>友情连接管理</span>
        <a href="./link/link_list.php" target="mainFrame" onFocus="this.blur()">链接列表</a>
        <a href="./link/add_link.php" target="mainFrame" onFocus="this.blur()">添加连接</a>
      </div>
	<div class="collapsed">
        <span>主贴管理</span>
        <a href="./post/post_list.php" target="mainFrame" onFocus="this.blur()">主贴列表</a>
    </div> 
	<div class="collapsed">
        <span>回贴管理</span>
        <a href="./reply/reply_list.php" target="mainFrame" onFocus="this.blur()">回帖列表</a>
    </div> 	 
	<div class="collapsed">
        <span>回收站</span>
        <a href="./del/del_list.php" target="mainFrame" onFocus="this.blur()">帖子列表</a>
    </div> 	  	 	
	<div class="collapsed">
        <span>修改论坛配置</span>
        <a href="./bbsconfig/edit_bbs.php" target="mainFrame" onFocus="this.blur()">修改配置</a>
    </div>  
    
   
    </div>
</body>
</html>