<?php
session_start();
session_unset();
setcookie(session_name(),'',time()-1,'/');
session_destroy();
//������¼ 
	echo '<script>
		alert("�ɹ��˳���");
	window.top.location.href="../index.php";</script>';

?>