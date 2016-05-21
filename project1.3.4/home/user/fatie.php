<?php
	include "./header.php";
	//判断用户是否登录后台  并且有权限 
	//	level==0 为管理员
	session_start();
	//var_dump($_SESSION);
	//如果用户没有登录  或者  用户不是管理员权限 
	if($_SESSION['flag'] != 1 ){
		echo "<script>alert('你还没有登录,请先登录');window.location.href='./list.php?cid={$_POST['cid']}';</script>";
		exit;
	}
	
	?>		

		<link href = "../css/register.css" rel = "stylesheet">
		<!--body 的开始-->
		<div id  = "body">
			<div class = "bodytitle">
				<div class = "btitleleft"><span style = ''>发表帖子<span></div>
				<div class = "btitleright"><a href = "" class = "zc">已有账号？现在登录</a></div>
			</div>
			<div style='margin-left:100px'  >
				<br>
				<form  action = "do_add_post.php" method = "post" >
					<input type = 'hidden' name= 'cid' value = '<?php echo $_POST['cid'] ;?>'>
					<input type = 'hidden' name= 'uid' value = '<?php echo $_SESSION['uid'] ;?>'>
					帖子标题：<input  type = 'text' name = 'title'><br><br>
					帖子内容：<textarea name = 'content' rows = '10' cols = '100' style="resize:none"></textarea><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'submit' style = 'background:#2763B3;color:white' value = '发表帖子'>
				</form>
				
			</div>	
			
		</div>
		<!--body 的结束-->
		<!-- footer 的开始-->
<?php
	include "footer.php";
?>