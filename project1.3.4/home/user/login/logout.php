<?php
session_start();
session_unset();
setcookie(session_name(),'',time()-1,'/');
session_destroy();
//跳到登录 
	echo '<script>
		alert("成功退出！");
	window.top.location.href="../index.php";</script>';

?>