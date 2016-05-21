<?php
header('Content-type:text/html;charset=utf-8');
	include "./header.php";
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	$time = time();
	$sql = "select * from post where id = '{$_GET['pid']}'";
	$pid = $_GET['pid'] ;
	$res = mysql_query($sql);
	if($res && mysql_num_rows($res)){
?>		
	<title>
		发帖回帖
	</title>
	<link href = "../css/detail.css" rel = "stylesheet">
	<link href = "../css/public.css" rel = "stylesheet">
		<link href = "../css/register.css" rel = "stylesheet">
		<!--body 的开始-->
		<div id  = "detail_body">
			<div class = 'bodytop'>
			</div>
			<div class = 'bodycenter'>
				<div class = 'fhact'>
					<a href = 'fatie.php'><img src ="../images/pn_post.png" > 
					<a href = '#reply' ><img src ="../images/pn_reply.png" > 
				</div>
				<div class = 'returnlist'>
					<span class="y pgb"><a href="list.php?cid=<?php echo $_GET['cid'] ?>">返回列表</a></span>
				</div>
			</div>
			<div class = 'clear'></div>
			
			<!--楼主的的帖子 start-->
			<?php while($info = mysql_fetch_assoc($res)){?>
			<div class = 'bodyfooter'>
				
				<table cellspacing= "0" class = 'tietale'>
					<tr height= "30px">
						<th class = "tabletd" width = "200px">回复：20|查看30</th>
						<th width = "760px" class = 'tabletile'><?php echo $info['title']?></th>
					</tr>
					<tr><td colspan = '2'class = 'wan'></td></tr>
					<tr height= "30px">
						<td class = "tabletd" align = "center">这是uid<?php echo $info['uid']?></td>
						<td align = "center" >发布于：<?php echo date('Y-m-d :H:i:s',$info['add_time'])?></td>
					</tr>
					<tr height= "300px">
						<td  align = "center" class = "tabletd hf" rowspan = '2'><image  class = 'touxiang'src = "../images/noavatar_middle.gif"><br>
							<ul >
								<li>UID:</li>
								<li>Na:uid<?php echo $info['uid']?></li>
							</ul>
						</td>
						<td><?php echo $info['content']?></td>
					</tr>
					<tr >
						<td class = 'hf'><a href = '' class  = 'fah' >&nbsp;&nbsp;回复</a></td>
					</tr>
				</table>
			</div
			<?php  
				}
				}
			?>
			<!--楼主的的帖子 end-->
<?php 
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 分页 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>	
	//定义每页显示的条数
	$pagerow = 3 ;
	//计算总页数 =   总数据数 / 每页显示条数
	//总条数
	@$csql = "select count(*) as c from reply where pid = '{$_GET['pid']}' {$and}";
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
	//@$sql = "select * from post  where cid = '{$_REQUEST['cid']}'";
	@$replytsql = "select * from reply where pid = '{$_GET['pid']}'  {$limit}";
	$replyres = mysql_query($replytsql);
		
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 分页 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	if($replyres && mysql_num_rows($replyres)){
		$flag = isset($_GET['flag'])?$_GET['flag']:1;	
		while($replyinfo = mysql_fetch_assoc($replyres)){
				
 ?>		
			<!--回复的帖子start-->
			<div class = 'bodyfooter'>
				<table cellspacing= "0" >
					<tr height= "30px">
						<td  width = "200px" class = "tabletd " align = "center"><?php echo $replyinfo['uid']?></td>
						<td  width = "760px"align = "center"  style='text-align:right;'>
							回复时间：<?php echo date('Y-m-d H:i:s',$replyinfo['re_time'])?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span >
								<?php 
									//echo "<script>alert($flag);</script>";
								if($flag < 4){
									switch($flag){
										case 1:
											echo '沙发';
											break;
										case 2:
											echo "板凳";
											break;
										case 3:
											echo  "地板";
											break;
									}
								}else{
									echo  $flag.'楼';
									}	$flag++;
								?>
							</span>
						</td>
					</tr>
					<tr height= "300px">
						<td  align = "center" class = "tabletd hf" rowspan = '2'><image  class = 'touxiang'src = "../images/noavatar_middle.gif"><br></td>
						<td><?php echo $replyinfo['content']?></td>
					</tr>
					<tr >
						<td class = 'hf'><a href = '' class  = 'fah' >&nbsp;&nbsp;回复</a></td>
					</tr>
				</table>
			</div>
			<?php
				}
				}
			?>
			<!--回复的帖子end-->
			
			<!--回复帖子对话框-->
			<div class = 'clear'></div>
			<a id = 'relply' name = 'reply'></a>
			<div class ='bodyfooter'>
				<form method = 'post' action = 'do_reply.php'>	
					<input type ='hidden' name = 'pid' value = '<?php  echo $_GET['pid']?>'>
					<input type ='hidden' name = 'uid' value = '<?php  echo $_SESSION['uid']?>'>
					<div class = ''>
						<table cellspacing= "0" >
								<th width = "200px" class = "tabletd " align = "center"></td>
								<th  width = "760px"align = "left" ></td>
							</tr>
							<tr height= "200px">
								<td  align = "center" class = "tabletd hf" rowspan = '2'><image  class = 'touxiang'src = "../images/noavatar_middle.gif"><br>
								</td>
								<td>&nbsp;
								<textarea rows = '10' cols = '100'style="resize:none;text-align:left" name = 'content'></textarea>
								</td>
							</tr>
							<tr >
								<td align = 'right' class = 'hf'>
									<input type ='image' src = '../images/pn_reply.png' >
									&nbsp;
								</td>
							</tr>
						</table>
					</div>
				</form>
			</div>
			<!--回复帖子对话框end-->
			<div>
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

	mysql_close();

?>				
		<table  align="right">
		  <tr class="fenye">
			<td align="" valign="top" class="fenye"><?php echo $count ;?>条回帖 <?php echo $page.'/'. $cpage ;?>页&nbsp;&nbsp;
				<!--首页-->
				<a href="./detail.php?pid=<?php echo $pid ?>&page=1&flag=1" target="" onFocus="this.blur()">首页</a>&nbsp;&nbsp
				<!--上一页-->
				<a href="./detail.php?pid=<?php echo $pid ?>&page=<?php echo $prev;?>&flag=
				<?php   $preflag = $flag - 2*$pagerow; $preflag = ($preflag<1)?1:$preflag; echo $preflag?> ">上一页</a>&nbsp;&nbsp;
				<!--下一页-->
				<a href ="./detail.php?pid=<?php echo $pid ?>&page=<?php echo $next?>&flag=
				<?php $nextflag = ($flag>$count)?$count:$flag; echo $nextflag ?>" >下一页</a>&nbsp;&nbsp;
				<!--尾页-->
				<a href= "./detail.php?pid=<?php echo $pid ?>&page=<?php echo $cpage?>&flag=
				<?php  $last = ( ($count%$pagerow) == 0)?($count-$pagerow):($count-$count%$pagerow+1);echo $last;?> " >尾页</a>
			</td>
		  </tr>
		</table>			
			<div class = 'clear'></div>
		<!--body 的结束-->
		<!-- footer 的开始-->
<?php
	include "footer.php";
?>