<?php
session_start();
session_unset();
setcookie(session_name(),'',time()-1,'/');
session_destroy();
//������¼ 
	echo '<script>window.top.location.href="../../home/user/index.php";</script>';

?>