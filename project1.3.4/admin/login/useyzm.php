<?php
//���뿪��
session_start();
//�����������ļ� 
include '../../public/func.inc.php';
//������֤�뺯��
$str = yzm();
//��ֵ�洢��session��
$_SESSION['yzm'] = $str;

?>