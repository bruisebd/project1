<?php
header('Content-type:text/html;charset=utf-8');
//包含数据库配置文件
include '../../public/dbconfig.php';
//包含函数库文件
include '../../public/func.inc.php';
//调用连接函数
conn();
//根据用户id 去表中查询此用户相关数据  并显示到表单中
//关联查询
$uid = $_GET['uid']; //用户ID

//以用户表为主来查询数据
$sql = "select id,username,pic,email,level,t_name,sex,birthday,edu,tel,address from user left join user_detail on user.id=user_detail.uid where id={$uid}";

$res = mysql_query($sql);
if($res && mysql_num_rows($res)){
	//查询到数据 取数据
	$uinfo = mysql_fetch_assoc($res);
	$y = date('Y',$uinfo['birthday']);
	$m = date('m',$uinfo['birthday']);
	$d = date('d',$uinfo['birthday']);
	
	//释放结果集资源
	mysql_free_result($res);
}else{
	echo '<script>alert("还没有用户，请先添加用户");window.location.href="add.php";</script>';
	exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="../css/css.css" type="text/css" rel="stylesheet" />
<link href="../css/main.css" type="text/css" rel="stylesheet" />
<link href="../css/user_mod.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="../images/main/favicon.ico" />
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理&nbsp;&nbsp;>&nbsp;&nbsp;添加用户</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
    <a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="./domod.php" enctype="multipart/form-data">
		<input type="hidden" name="uid" value="<?php echo $uinfo['id'];?>">
		<input type="hidden" name="oldpic" value="<?php echo $uinfo['pic'];?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">用户名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="username"  disabled="disabled" value = '<?php echo $uinfo['username'];?>' class="text-word" >
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
			<td align="right" valign="middle" class="borderright borderbottom bggray">用户权限：</td>
			<td align="left" valign="middle" class="borderright borderbottom main-for">
				<select name="level" id="level">
					<option value="0" <?php echo ($uinfo['level'] == '0') ? 'selected' : '';?> >&nbsp;&nbsp;管理员</option>
					<option value="2"  <?php echo ($uinfo['level'] == '2') ? 'selected' : '';?>>&nbsp;&nbsp;版主</option>
					<option value="1"  <?php echo ($uinfo['level'] == '1') ? 'selected' : '';?>>&nbsp;&nbsp;普通用户</option>
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
				<input type="text" name="address" value="<?php echo $uinfo['address'];?>" class="text-word">
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
    </td>
    </tr>
</table>
</body>
</html>