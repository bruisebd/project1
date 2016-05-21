<?php
	header('Content-type:text/html;charset=utf-8');
	//如果没有安装  跳转到安装页面
	if(!file_exists('../../install/install.lock')){
		echo '<script>alert("对不起，您还没有安装，请先安装");window.location.href="../../install/install.php";</script>';
		exit;
	}
	include "./header.php";
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	include '../../public/bbsconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	$flag = '';
	//查看分区的sql
	$sql = "select id,pname from part";
	//执行sql
	$res = mysql_query($sql);
	
	$linksql = "select * from link";
	$linkres = mysql_query($linksql);
	
?>	
	<meta charset = "utf-8">
	<meta name = 'Keywords' <?php  echo (WZ_KEYWORDS)?>>
		<link href = "../css2/public.css" rel = "stylesheet" type = "text/css">
		<link href = "../css2/luntan.css" rel = "stylesheet" type = "text/css">
		<link href = "../css2/index.css" rel = "stylesheet" type = "text/css">
		<title><?php echo WZ_NAME ;?></title>
	<body>
<?php  if(WZ_KG == 'on'){?>
	<!--头部center内容end-->	
		<div id = "content" name = "content">
		<div id="path">
			  <a href="" class="index"></a>
			  <em></em>
			  <a href="" class="path_menu">论坛</a>
		</div>
			<div class = "maincontent">
				<div class = "">
					<table width = "550px" border = "0" cellspacing = "0" >
						<tr height = "33px">
							<td><image src = "../images/chart.png" ></td>
							<td><span class = 'title'>今日：</span>1250</td>
							<td ><span class = 'title'>|&nbsp;&nbsp;&nbsp;昨日：</span>1345</td>
							<td ><span class = 'title'>|&nbsp;&nbsp;&nbsp;帖子：</span>1220</td>
							<td ><span class = 'title'>|&nbsp;&nbsp;&nbsp;会员：</span>1223</td>
							<td><span class = 'title'>|&nbsp;&nbsp;&nbsp;欢迎新会员：</span>1520</td>
						<tr>
					</table>
				</div>
				<?php
					//便利分区的信息
					if($res && mysql_num_rows($res)){
						while($info = mysql_fetch_assoc($res)){
						//查询模块的sql
							$catesql = "select id,pid,name,addtime from cate where cate.pid = '{$info['id']}'";
								//执行sql
								$cateres = mysql_query($catesql);
								//分区中是否为空的标志位
								$flag = mysql_num_rows($cateres);
								//如果分区不为空执行 遍历分区中的所有模块
								if(!empty($flag)){
							
				?>
				<div class = "conindex">					<!--跳转到页表页-->
					<div class = "indexcontitle" ><?php  echo $info['pname']?></div>
						<!--循环出每个分区的模板-->
							<?php
								
									//遍历每个模块
									if($cateres && mysql_num_rows($cateres)){
										while($cateinfo = mysql_fetch_assoc($cateres)){									
										
							?>
						<div class = "catelist" >
							
							<table width = "960px">
								<tr>
									<td align = "right" rowspan = "3" width = "54px"><img src = "../images/forum_new.gif "s></td>
									<th align = "left" width = ""><a href = './list.php?cid=<?php echo $cateinfo['id']?>'><?php echo $cateinfo['name']?></a></th>
									<td></td>
								</tr>	
								<tr>
									<td>主题：54，帖子：244</td>
									<td></td>
									<td align = "left" width = "220px" >最后发布：2015-9-11</<?php// echo date('Y-m-d H:i:s',$info['addtime'])?></td>
								</tr>
								<tr><td>&nbsp;</td></tr>
							</table>								
						</div>	
						<?php
									}
								}	
								//如果分区为空则跳出本次循环继续下一次循环
							}else{
								continue;
							}
						?>		
				</div>
				<?php					
						}
					}
					//释放资源
					mysql_free_result($res);
					//关闭数据库
					mysql_close();
				?>
			</div>
		</div>
				

<?php }else{
?>
		<div id = "footer">
			<div class = "weihu" height = 400>
					<span>
						&nbsp;&nbsp;&nbsp;请见谅网站正在维护中。。。。。
					</span>
					
			</div>
		</div>	
<?php
}
?>	
		<?php 
			
			if($linkres && mysql_num_rows($linkres)){		
		?>
		<div id = "footer">
		
			<div class = "friendlink">
	
				<div class = "friendup">&nbsp;&nbsp;<span>友情链接</span>
				<div class = 'clear'></div>
					<ul>
						<?php
							while($info =  mysql_fetch_assoc($linkres)){
						?>
						<li><image src= "../../admin/link_logo_upload/<?php  echo $info['pic'] ?> ">
						<a href = '<?php echo $info['url']?>'><?php echo $info['title']?></a>
						</li>
						<?php
							}
							}
						?>
					</ul>
				</div>
				<div class = 'clear'></div>
				
			</div>
		</div>
		

<?php
	include "footer.php";
?>