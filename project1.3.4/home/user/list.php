<?php
	header('Content-type:text/html;charset=utf-8');
	session_start();
	include "./header.php";
	//包含数据库配置文件
	include '../../public/dbconfig.php';
	include '../../public/bbsconfig.php';
	//包含函数库文件
	include '../../public/func.inc.php';
	//调用连接函数
	conn();
	//板块id
	$cid = $_REQUEST['cid'];
	
//********************************************   分页  *****************************************
	//如果用户进行了搜索 那么要拼接where条件  isset  !empty
	if(!empty($_GET['pname'])){
		$and = "and title like '%{$_GET['pname']}%' and  del = 0";
		$url = "&pname={$_GET['pname']}";
	}
	//定义每页显示的条数
	$pagerow = 10;
	
	//计算总页数 =   总数据数 / 每页显示条数
	//总条数
	@$csql = "select count(*) as c from post  where cid = '{$_REQUEST['cid']}' {$and}";
	
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
	@$sql = "select * from post where cid ='{$_REQUEST['cid']}'  {$and} and  del = 0 order by paixu  desc ,id asc  {$limit} ";
	$res = mysql_query($sql);
	
	//********************************************   分页  *****************************************
	
	//查发帖表中的所有数据
	//$sql = "select * from post  where cid = '{$_REQUEST['cid']}'";
	//$res = mysql_query($sql);
?>
		<meta charset = "utf-8">
		<link href = "../css2/public.css" rel = "stylesheet" type = "text/css">
		<link href = "../css2/luntan.css" rel = "stylesheet" type = "text/css">
		<link href = "../css2/list.css" rel = "stylesheet" type = "text/css">

	<!--头部center内容end-->	
		<div id = "content" name = "content">
			<div  class = "act">
				<!--发帖的表单-->
				<form action ="fatie.php" method = 'post'>
					<input type = 'hidden' name = 'cid' value = '<?php echo $_GET['cid']; ?>'>
					<input src = '../images/pn_post.png' type = 'image' >
				</form>
			</div>
			<!--帖子列表start-->
			<div class = "maincontent">
				<div class "tie">
					<div class = 'clear'></div>
					<div >
						<!--帖子的查询表达-->
						<form action = './list.php' method = 'get'>&nbsp;&nbsp;
							<span><strong>主贴名：</strong></span>
							 <input type="text" name="pname" value="" class="text-word">
							 <input type="hidden" name="cid" value="<?php echo $cid?>" class="text-word">
							 <input name="" type="submit" value="查询" class="text-but">
						</form>
					</div>
					<div class = 'clear'></div>
					<table width = "100%"   cellspacing = "0" 	 id = "tiezi">
						<tr class = "contitle" align = "left">
							<th width = "" colspan = "2" align = '' >
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;帖子标题</th>						
							<th width = "" align = 'center'>作者</th>
							<th width = "" align = 'center'>回复/查看</th>
							<th width = "" align = 'center'>最后发表</th>
							<!--判断权限  当权限不为普通用户时候可以 进行置顶 加精 高亮操作-->
							<?php  if(($_SESSION['level']!=1) && ($_SESSION['flag']==1) ) {?>
							<th width = "" align = 'center'>操作</th>
							<?php
							}
							?>
						</tr>
						<?php 
							//循环遍历出发帖
							if($res && mysql_num_rows($res)){
								while($info = mysql_fetch_assoc($res)){
						?>			
						<tr class = "context" align = "left" >
							<td colspan = "2" align = ''>&nbsp;&nbsp;<span style = "color:Red;"><?php  echo ($info['sta'] == 1)? "顶":""; ?>&nbsp;&nbsp;<?php  echo ($info['jinghua'] == 1)? "精华":" "; ?></span>
								<span  >&nbsp;<a <?php  echo ($info['gaoliang'] == 1)? "style='background:yellow'":" "; ?> href = './detail.php?pid=<?php echo $info['id']?>&cid=<?php echo $_GET['cid']?>'><?php  echo $info['title']?></a></span>
							</td>
							<td align = 'center'">uid<?php  echo $info['uid']?></td>
							<!--传postid-->											
							<td align = 'center'>
								<a href = './detail.php?pid=<?php echo $info['id']?>&cid=<?php echo $_GET['cid']?>'>查看</a></td>
							<td align = 'center'><?php  echo date('Y-m-d H:i:s',$info['add_time'])?></td>
							<!--判断权限  当权限不为普通用户时候可以 进行置顶 加精 高亮操作-->
							<?php if(($_SESSION['level']!=1) && ($_SESSION['flag']==1)){?>
							<td align = 'center'>
								<a href = 'zhiding.php?pid=<?php echo $info['id']?>&cid=<?php echo $_GET['cid']?>&id=<?php echo $info['id']?>' ><?php  echo ($info['sta'] == 1)? "取消置顶":"置顶"; ?></a>|<a href = 'gaoliang.php?pid=<?php echo $info['id']?>&cid=<?php echo $_GET['cid']?>&id=<?php echo $info['id']?>' >
								<?php  echo ($info['gaoliang'] == 1)? "取消高亮":"高亮显示"; ?></a>|
								<a href = 'jiajing.php?pid=<?php echo $info['id']?>&cid=<?php echo $_GET['cid']?>&id=<?php echo $info['id']?>' >
								<?php  echo ($info['jinghua'] == 1)? "取消加精":"加精"; ?></a>
								
							</td>
							<?php 
							}
							?>
						</tr>
						<?php
								}	 
								
							}
						?>				
					</table>
				</div>	
			</div>
			<!--帖子列表end-->
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
		@mysql_free_result($res);

	mysql_close();



?>				
		<table  align="right">
		  <tr class="fenye">
			<td align="" valign="top" class="fenye"><?php echo $count ;?>条数据 <?php echo $page.'/'. $cpage ;?>页&nbsp;&nbsp;
				<a href="./list.php?cid=<?php echo $cid ?>&page=1<?php echo $url;?>" target="" onFocus="this.blur()">首页</a>&nbsp;&nbsp
				<a href="./list.php?cid=<?php echo $cid ?>&page=<?php echo $prev;?>" >上一页</a>&nbsp;&nbsp;
				<a href ="./list.php?cid=<?php echo $cid ?>&page=<?php echo $next.$url;?>" >下一页</a>&nbsp;&nbsp;
				<a href= "./list.php?cid=<?php echo $cid ?>&page=<?php echo $cpage.$url;?>" >尾页</a>
			</td>
		  </tr>
		</table>			
			</div>
		</div>
<?php
	include "footer.php";
?>