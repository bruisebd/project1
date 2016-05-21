<?php
	header('Content-type:text/html;charset=utf-8');
	include "./header.php";
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	include '../../public/bbsconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	$uid = $_GET['uid'];
	$usql = "select id,username,pic,email,level,t_name,sex,birthday,edu,tel,address from user left join user_detail on user.id=user_detail.uid where id='{$uid}'";
	$userres = mysql_query($usql);
	if($userres && mysql_num_rows($userres)){
			
		$uinfo = mysql_fetch_assoc($userres);
		$y = date('Y',$uinfo['birthday']);
		$m = date('m',$uinfo['birthday']);
		$d = date('d',$uinfo['birthday']);
		//释放结果集资源
		mysql_free_result($userres);
	}
?>	
	<title>
			用户信息	
	</title>
	<link href = "../css/detail.css" rel = "stylesheet">
	<link href = "../css/public.css" rel = "stylesheet">
	<link href = "../css/register.css" rel = "stylesheet">
	

	<link href="../css2/user_mod.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="../images/main/favicon.ico" />
		<!--body 的开始-->
		<div id  = "detail_body">
			<div class = 'bodytop'>
			</div>
			<div class = 'bodycenter'>
		
				
			</div>
			<div class = 'clear'></div>
			<!--用户资料页 start-->
			<div class = ''>
				<form method="post" action="./domod.php" enctype="multipart/form-data">
					<input type="hidden" name="uid" value="<?php echo $uinfo['id'];?>">
					<input type="hidden" name="oldpic" value="<?php echo $uinfo['pic'];?>">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
					  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">用户名：</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<?php echo $uinfo['username'];?>
						
						</td>
					  </tr>
					  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">真实姓名：</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="t_name"  value = '<?php echo $uinfo['t_name'];?>' class="text-word" >
						</td>
					  </tr>    
					  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">头像</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="file" name="pic" > <img src="../../uploads/<?php echo $uinfo['pic'];?>"> 	
						</td>
						</tr>
						<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
							<td align="right" valign="middle" class="borderright borderbottom bggray">邮箱：</td>
							<td align="left" valign="middle" class="borderright borderbottom main-for">
								<input type="email" name="email" value="<?php echo $uinfo['email'];?>" class="text-word">
							</td>
						</tr>
						<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
							<td align="right" valign="middle" class="borderright borderbottom bggray">性别：</td>
							<td align="left" valign="middle" class="borderright borderbottom main-for">
								<input type="radio" name="sex"  value = '0' <?php echo ($uinfo['sex'] === '0') ? 'checked' : '';?> >女
								<input type="radio" name="sex"  value = '1'  <?php echo ($uinfo['sex'] === '1' ) ? 'checked' : '';?> >男
							</td>
						</tr>
						<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
							<td align="right" valign="middle" class="borderright borderbottom bggray">生日：</td>
							<td align="left" valign="middle" class="borderright borderbottom main-for">
								<select name="y">
								<?php
								$year = date('Y');
								for($i = 1970;$i <= $year;$i++){ ?>

									<option value="<?php echo $i ;?>" <?php echo  ($i == $y)? 'selected' : '';?> > <?php echo $i; ?>年</option>';
								<?php
									}
								?>
							  </select>
							 <select name="m">
								<?php
								for($i = 1;$i <= 12;$i++){?>
									<option value="<?php echo $i ;?>" <?php echo  ($i == $m)? 'selected' : '';?> > <?php echo $i; ?>月</option>';
								<?php
								}
								?>
							</select>
							 <select name="d">
								<?php
								for($i = 1;$i <= 31;$i++){?>
									<option value="<?php echo $i ;?>" <?php echo  ($i == $d)? 'selected' : '';?> > <?php echo $i; ?>日</option>';
								<?php
								}
								?>
							</select>			
							</td>
						</tr>
						<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
							<td align="right" valign="middle" class="borderright borderbottom bggray">学历：</td>
							<td align="left" valign="middle" class="borderright borderbottom main-for">
								<select name="edu" id="edu">
									<option value="0">小学</option>
									<option value="1">初中</option>
									<option value="2">高中</option>
									<option value="3">大学</option>
								</select>
							</td>
						</tr>		
						<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
							<td align="right" valign="middle" class="borderright borderbottom bggray">电话：</td>
							<td align="left" valign="middle" class="borderright borderbottom main-for">
								<input type="text" name="tel" value="<?php echo $uinfo['tel'];?>" class="text-word">
							</td>
						</tr>
						<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
							<td align="right" valign="middle" class="borderright borderbottom bggray">地址：</td>
							<td align="left" valign="middle" class="borderright borderbottom main-for">
								<input type="text" name="address" value="<?php echo $uinfo[''];?>" class="text-word">
							</td>
						</tr>		
						<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
							<td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
							<td align="left" valign="middle" class="borderright borderbottom main-for">
								<input name="" type="submit" value="修改" class="text-but">
							</td>
						</tr>
					</table>
				</form>
			
			</div
			<!--用户资料页 end-->
		
			<div class = 'clear'></div>
		<!--body 的结束-->
		<!-- footer 的开始-->
<?php
	include "footer.php";
?>