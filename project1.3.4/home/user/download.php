<?php
include '../../public/bbsconfig.php';
//指定下载文件MIME类型
header('Content-type:image/jpeg');
//指定下载的名称 告诉浏览器以附件方式处理
header('Content-disposition:attachment;filename=a.jpg');
//将内容读给浏览器
readfile("../images/".WZ_LOGO."");
?>