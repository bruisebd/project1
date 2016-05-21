<?php
	session_start();
	include '../../public/bbsconfig.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php echo WZ_NAME ?>
		</title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "../css/public.css" type = "text/css">
		<link href = "../css/public.css" rel = "stylesheet" type = "text/css">
		<link href = "../css2/luntan.css" rel = "stylesheet" type = "text/css">

	</head>
	<body>
		<!--header 头的开始-->
		<div id  = "header"> 
			<div class = "top">
				<div class = "topleft"><image src = "../images/<?php  echo WZ_LOGO ;?>"></div>
				<!--topright 右边登录开始-->
				<div class = "topright">
				<?php
				//判断 网站是不是开启状态 on 为开启 off 为关闭
				if(WZ_KG == 'on'){
					if(!($_SESSION['flag'] == 1) ){
				?>
					<form action = "./login/dolog.php" method = "post">
						<table cellspacing = "0" class = 'logtable' >
						<tr><td>&nbsp;</td><tr>
							<tr>
								<th>用户名</th>
								<td><input type = "text" name = "username"></td>
								<th></th>
								<th></th>
							</tr>
							<tr>
								<th>密&nbsp;&nbsp;码</th>
								<td><input type = "password" name = "pwd"></td>
								<td>&nbsp;<input type = "submit" value = "登录"></td>
								<th>&nbsp;<a href = "register.php">立即注册</a></th>
							</tr>
						</table>
					</form>
					<?php
					}else{
					
					?>
		
						<div id = "usershow">
							<table width = "px" border = "0" cellspacing = "0" ><br> 
								<tr height = "33px">
									<td><image src = "../images/user_online.png" ></td>
									<td><span class = 'title'><strong>
									<?php 
										switch($_SESSION['level']){
											case 0:
												echo "超级管理员";break;
											case 1:
												echo "会员";break;
											case 2:
												echo "版主";break;
											
										}
									
										echo $_SESSION['uname'];
										
									?>
									</strong>&nbsp;在线</span>&nbsp;</td>
									<td ><span class = 'title'>|&nbsp;<a href = './user_info.php?uid=<?php echo $_SESSION['uid']?>'>设置</a>&nbsp;</span></td>
									<?php	
										if($_SESSION['level'] == 0 || $_SESSION['level'] == 2){
									?>
									<td ><span class = 'title'>|&nbsp;&nbsp;<a href = '../../admin/login/login.php?>'>管理中心</a></span>&nbsp;</td>
									<?php 
									}
									?>
									<td><span class = 'title'>|&nbsp;&nbsp;<a href= './login/logout.php' >退出</a>&nbsp;</span></td>
									<td rowspan = '2'><span class = 'title' >&nbsp;&nbsp;<image src = '../../uploads/<?php  echo $_SESSION['pic']?>'></span></td>
								<tr>
							</table>
						</div>
					<?php
						}
						
					?>
				</div>
				<?php }?>
			</div>
			<div class = " clear"></div>

			<div class = "headercenter">
				<div class = "cenleft">
					<ul>
						<li><a href = 'index.php' style = "color:white">论坛首页<a>&nbsp;</li>
						
			
					</ul>
				</div>
				<div class = "cenright">
					<input type = "button" value = "快捷导航">
				</div>
			</div>
			<div class = "headerfooter">
				<div class = "hfooterleft">
					<input type = "text" name = "search" class = "ss" value = "请输入搜索内容">
					<input type = "image" src = '../images/sousuo.png' class = "soubut">
				</div>
				<div class = "hfooterright">
					<span class = "resou"><strong>热搜:</strong></span>
					<span class = "xuanxiang">活动</span>
					<span class = "xuanxiang">交友</span>
					<span class = "xuanxiang">教育</span>
					<span class = "xuanxiang">幽默</span>
					<span class = "xuanxiang">搞笑</span>
					<span class = "xuanxiang">房产</span>
					<span class = "xuanxiang">购物</span>
					<span class = "xuanxiang">二手</span>
					<span class = "xuanxiang">旅游</span>
					<span class = "xuanxiang">帮助</span>
					
				</div>
			
			</div>
							<!--路径部分start-->
			
			<!--路径部分end-->
			
		</div>
		<!--head:er 头的结束-->