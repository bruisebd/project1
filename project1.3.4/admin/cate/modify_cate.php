<?php
	header('Content-type:text/html;charset=utf-8');
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//var_dump(conn());
	//查询所有分区
	$cateid = $_GET['cid'];
	$catesql ="select cate.id cateid,name cate_name,pname,cate.addtime from cate,part where cate.pid= part.id and  cate.id = '{$cateid}'";
	$cateres = mysql_query($catesql);
	if($cateres && mysql_num_rows($cateres)){
		$cateinfo = mysql_fetch_assoc($cateres);	
	}
	$partsql = "select id,pname from part";
	$partres = mysql_query($partsql);

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>主要内容区main</title>
		<link href="../css/css.css" type="text/css" rel="stylesheet" />
		<link href="../css/add_part.css" type="text/css" rel="stylesheet" />
		<link href="../css/main.css" type="text/css" rel="stylesheet" />
		<link rel="../shortcut icon" href="images/main/favicon.ico" />
	</head>	
	<body>
	<!--main_top-->
	<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
		<tr>
			<td width="99%" align="left" valign="top">您的位置:板块管理&nbsp;&nbsp;>&nbsp;&nbsp;添加板块</td>
		</tr>
		<tr>
			<td align="left" valign="top" id="addinfo">
			<a href="./add_cate.html" target="mainFrame" onFocus="this.blur()" class="add">新增板块</a>
			</td>
		</tr>
		<tr>
		<td align="left" valign="top">
			<form method="post" action="./do_modify_cate.php">
				<input type = 'hidden' name = 'cateid' value = '<?php echo $cateinfo['cateid'];?>'>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">板块名字</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input type="text" name="catename" value="<?php  echo $cateinfo['cate_name']?>" class="text-word">
						</td>
					</tr>
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">所属分区：</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
							<select name="partid" id="level">
							<?php
								//c
								if($partres && mysql_num_rows($partres)){
									while($partinfo = mysql_fetch_assoc($partres)){
								?>
								<option value="<?php echo $partinfo['id']?>" <?php  
									echo $cateinfo['pname']== $partinfo['pname']?selected:'';
								?>>&nbsp;&nbsp; <?php  echo $partinfo['pname']?></option>
							<?php 
								}
								}
							?>	
							</select>
						</td>
					</tr>					
					<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
						<td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
						<td align="left" valign="middle" class="borderright borderbottom main-for">
						<input name="" type="submit" value="提交" class="text-but">
						<input name="" type="reset" value="重置" class="text-but"></td>
					</tr>
				</table>
			</form>
		</td>
		</tr>
	</body>
</html>