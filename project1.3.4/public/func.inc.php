<?php
//连接数据库
function conn(){
	$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);
	if(mysql_errno()){
		exit('数据库连接失败');
	}
	mysql_select_db(DB_NAME);
	mysql_set_charset(DB_CHARSET);
	return $link;
}

//上传函数
/*
功能:文件上传
参数：
@param string $fname 上传项的表单名称
@param array $allowtype 上传允许的MIME类型
@param int $allowsize 上传允许的文件大小
@param string $path 上传文件目录
返回值：
@return array $info
	'info' 存储的是信息 文件名称   失败原因
	'error' 上传是否成功 true成功 false失败
	
*/
function upload($fname,$path = './uploads/',$allowtype = array('image/jpeg','image/png','image/gif','image/pjpeg'),$allowsize = 1048576){
	//定义返回值的信息
	$info = array('info' => '','error' => false);
	$file = $_FILES[$fname];
	//1.先判断错误号
	if($file['error'] > 0){
		switch($file['error']){
			case 1:
				$info['info'] = '上传大小超过了配置文件php.ini中upload_max_filesize选项的大小';
				break;
			case 2:
				$info['info'] = '超过了表单选项MAX_FILE_SIZE的大小';
				break;
			case 3:
				$info['info'] = '文件部分被上传';
				break;
			case 4:
				$info['info'] = '没有文件被上传';
				break;
			case 6:
				$info['info'] = '没有找到临时文件夹';
				break;
			case 7:
				$info['info'] = '对临时文件没有写入权限';
				break;
		}
		return $info;
	}
	//2.判断类型
	if(!in_array($file['type'],$allowtype)){
		$info['info'] = '上传类型不合法';
		return $info;
	}

	//3.判断大小
	if($file['size'] > $allowsize){
		$info['info'] = '请上传1M以内的图像';
		return $info;
	}

	//4.随机文件名称
	//获取上传文件后缀名
	$ext = pathinfo($file['name'],PATHINFO_EXTENSION);
	do{
		$newname = time().rand(1,9999).'.'.$ext;
	}while(file_exists($path.$newname));

	//5.进行上传  move_uploaded_file  is_uploaded_file

	if(is_uploaded_file($file['tmp_name'])){
		if(move_uploaded_file($file['tmp_name'],$path.$newname)){
			$info['error'] = true;
			$info['info'] = $newname;
		}else{
			$info['info'] = '文件上传失败';
		}
	}else{
		$info['info'] = '不是通过HTTP POST方式上传的';
	}
	return $info;
}


/**
只能缩放jpg的图像
功能:
	等比例缩放
参数:
	@param string $path 要缩放的文件路径
	@param int $width 缩放后的宽
	@param int $height 缩放后的高
	@param string $pre 缩放后文件的前缀 默认为s_ 如: ./a.jpg   ./s_a.jpg
返回值:
	返回缩放后的图像名称
*/

function suofang($path,$width,$height,$pre = 's_'){
	//1.创建画布
	//要缩放的图像
	//$srcimg = imagecreatefromjpeg($path);
	//等比例缩放
	$srcinfo = getimagesize($path);
	switch($srcinfo[2]){
			case 1:
				$srcimg = imagecreatefromgif($path);
				$imgfunc = 'imagegif';
				break;
			case 2:
				$srcimg = imagecreatefromjpeg($path);
				$imgfunc = 'imagejpeg';
				break;
			case 3:
				$srcimg = imagecreatefrompng($path);
				$imgfunc = 'imagepng';
				break;
		}
	//等比例计算
	if($srcinfo[0] > $srcinfo[1]){//原图像宽 > 原图像高  按宽的比例来计算
		$height = $width/$srcinfo[0] * $srcinfo[1];
	}else{//按高的比例来计算
		$width = $height/$srcinfo[1] * $srcinfo[0];
	}

	//目标资源
	$dstimg = imagecreatetruecolor($width,$height);

	//2.
	//3.开始绘画
	imagecopyresampled($dstimg,$srcimg,0,0,0,0,$width,$height,$srcinfo[0],$srcinfo[1]);

	/*//4.header
	header('Content-type:image/jpeg');
	//5.输出图像
	imagejpeg($dstimg);
	*/
	//./Meinv084.jpg   ./s_Meinv084.jpg 
	$newname = dirname($path).'/'.$pre.basename($path);
	
	$imgfunc($dstimg,$newname);
	
	//6.销毁资源
	imagedestroy($dstimg);
	imagedestroy($srcimg);
	
	return $pre.basename($path);
	
}

/**
功能：验证码
参数：
@param int $width  验证码的宽度 默认值为100
@param int $height 验证码的高度 默认值为30
@param int $len  验证码的个数  默认4个
@param int $type 验证码的类型 默认是数字 0代表数字 1代表字母 2代表数字字母混合

返回值：
@return string $str 返回验证码字符

*/

function yzm($width = 100,$height = 30,$len = 4,$type = 0){
	//1.创建画布
	$img = imagecreatetruecolor($width,$height);
	//2.随机颜色
	$sys = imagecolorallocate($img,rand(0,120),rand(0,110),rand(20,60));
	$qys = imagecolorallocate($img,rand(130,250),rand(140,240),rand(150,255));

	//3.开始绘画
	imagefilledrectangle($img,0,0,$width,$height,$qys);

	//画字符
	//1画布资源  2.字大小 3.角度 0从左到右  4，5 第一个字符的左下角坐标点(x,y)  6.颜色 7.字体文件 8.随机字符  
	//array imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
	//$str = 'abcd';
	//随机4个字符
	

	switch($type){
		case 0:
			//数字
			$str = implode('',array_rand(range(0,9),$len));
			break;
		case 1:
			//字母
			$str = implode('',array_rand(array_flip(range('a','z')),$len));
			break;
		case 2:
			//数字、字母混合
			$str = implode('',array_rand(array_flip(array_merge(range('a','z'),range(0,9))),$len));
			break;
	}
	
	for($i = 0;$i < $len;$i++){
		imagettftext($img,13,rand(-10,10),rand(($width/$len)*$i,($width/$len)*($i+1)-10),rand(12,$height),$sys,'./simkai.ttf',$str[$i]);
	}

	//画干扰点
	//画点
	for($i = 1;$i < 100;$i++){
		imagesetpixel($img,rand(0,$width),rand(0,$height),$sys);
	}
	//画线
	for($i = 1;$i < 5;$i++){
		imageline($img,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$sys);
	}

	//4.输出header头
	header('Content-type:image/jpeg');

	//5.输出
	imagejpeg($img);

	//6.销毁
	imagedestroy($img);
	//返回验证码字符
	return $str;
}

?>