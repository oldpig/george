<?php 
/***************************** 
*���ݿ����� 
*****************************/ 
$conn = @mysql_connect("localhost","george","iamhgj"); 
if (!$conn){ 
die("�������ݿ�ʧ�ܣ�" . mysql_error()); 
} 
mysql_select_db("contacts", $conn); 
//�ַ�ת�������� 
mysql_query("set character set 'utf8'"); 
//д�� 
mysql_query("set names 'utf8'"); 
?>