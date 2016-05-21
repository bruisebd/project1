<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//搜索  拼接where条件
	//分页  limit子句
	//总结 搜索+分页   1.点击页数链接  条件没有了  需要传过去  2.总条数  按搜索条件去求总条数

	//==================搜索表单==============================

	//如果用户进行了搜索 那么要拼接where条件  isset  !empty
	if(!empty($_GET['user'])){
		$where = "where username like '%{$_GET['user']}%'";
		$url = "&user={$_GET['user']}";
	}
	//定义每页显示的条数
	$pagerow = 3;

	//计算总页数 =   总数据数 / 每页显示条数
	//总条数
	@$csql = "select count(*) as c from user {$where}";
	$cres = mysql_query($csql);
	$arr = mysql_fetch_assoc($cres);
	$count = $arr['c'];//总条数
	$cpage = ceil($count/$pagerow);   //进一法取整


	//当前页  如果传页数的值  则使用传的值  否则使用1
	$page = isset($_GET['page']) ? $_GET['page'] : 1;


	//跳过几条  偏移量  公式：(当前页-1)*每页显示的条数
	$offset = ($page - 1) * $pagerow;

	//limit 
	$limit = "limit {$offset},{$pagerow}";

	//查询用户表所有信息
	@$sql = "select id,username,pic,email,level,rtime,rip from user {$where} {$limit}";

	$res = mysql_query($sql);

?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>主要内容区main</title>
	<link href="../css/css.css" type="text/css" rel="stylesheet" />
	<link href="../css/user_list.css" type="text/css" rel="stylesheet" />
	<link href="../css/main.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="../images/main/favicon.ico" />
	<style>
	
	</style>
	</head>
	<body>
	<!--main_top-->
	<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
	  <tr>
		<td width="99%" align="left" valign="top">您的位置：用户管理</td>
	  </tr>
	  <tr>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
			<tr>
			 <td width="90%" align="left" valign="middle">
				 <form method="get" action="main_list.php">
				 <span>用户名：</span>
				 <input type="text" name="user" value="" class="text-word">
				 <input name="" type="submit" value="查询" class="text-but">
				 </form>
			 </td>
			  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="./main_info.php" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>
			</tr>
		</table>
		</td>
	  </tr>
	  <tr>
		<td align="left" valign="top">
		<form method = 'post' action  = './del.php'>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
			  <tr>
				<th align="center" valign="middle" class="borderright">编号</th>
				<th align="center" valign="middle" class="borderright">用户名</th>
				<th align="center" valign="middle" class="borderright">头像</th>
				<th align="center" valign="middle" class="borderright">邮箱</th>
				<th align="center" valign="middle" class="borderright">权限</th>
				<th align="center" valign="middle" class="borderright">注册时间</th>
				<th align="center" valign="middle" class="borderright">注册IP</th>
				<th align="center" valign="middle">操作</th>
			  </tr>
			  <?php
			  if($res && mysql_num_rows($res)){
				while($uinfo = mysql_fetch_assoc($res)){
			
			  ?>
			  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
				<td align="center" valign="middle" class="borderright borderbottom"><input type = 'checkbox' name = 'uid[]' value = '<?php echo $uinfo['id']; ?>'><?php echo $uinfo['id']?></td>
				<td align="center" valign="middle" class="borderright borderbottom"><?php echo $uinfo['username']?></td>
				<td align="center" valign="middle" class="borderright borderbottom"><img src="../../uploads/<?php echo $uinfo['pic']?>"></td>
				<td align="center" valign="middle" class="borderright borderbottom"><?php echo $uinfo['email']?></td>
				<td align="center" valign="middle" class="borderright borderbottom">
				<?php
				
					switch($uinfo['level']){
						case 0: 
							echo '超级管理员'; break;
						case 1: 
							echo '版主'; break;		
						case 2: 
							echo '普通用户'; break;	
						
					}
					//echo (!$uinfo['level']) ? '超级管理员' : '普通用户';
				?>
				</td>
				<td align="center" valign="middle" class="borderright borderbottom"><?php echo date('Y-m-d H:i:s',$uinfo['rtime'])?></td>
				<td align="center" valign="middle" class="borderright borderbottom"><?php echo long2ip($uinfo['rip'])?></td>
				<td align="center" valign="middle" class="borderbottom">
				<a href="./mod.php?uid=<?php echo $uinfo['id'] ?>" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span>
				<a href="./del.php?uid=<?php echo $uinfo['id'] ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
			  </tr>
				<?php }
				?>
			</table>
			<input id = 'pdel' name="" type="submit" value="批量删除" class="text-but">
		</form>
		
<?php
		//计算上一页  当前页-1
		$prev = $page - 1;
		//进行越界判断
		if($prev <= 1){
			$prev = 1;
		}
		//计算下一页 当前页+1
		$next = $page + 1;
		//进行越界判断  如果当前页 大于 等于 总页数 赋值为总页数
		if($next >= $cpage){
			$next = $cpage;
		}
			//释放结果集资源
		mysql_free_result($res);
	}else{
		//没有数据
		echo '<script>alert("没有查到此用户");window.location.href="main_list.php";</script>';
		exit;
	}

	mysql_close();



?>	
		<table  align="right">
		  <tr class="fenye">
			<td align="" valign="top" class="fenye"><?php echo $count ;?>条数据 <?php echo $page.'/'. $cpage ;?>页&nbsp;&nbsp;
				<a href="./main_list.php?page=1<?php echo $url;?>" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp
				<a href="./main_list.php?page=<?php echo $prev.$url;?>"  target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;
				<a href ="./main_list.php?page=<?php echo $next.$url;?>" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;
				<a href= "./main_list.php?page=<?php echo $cpage.$url;?>" target="mainFrame" onFocus="this.blur()">尾页</a>
			</td>
		  </tr>
		</table>
	</body>
	</html>