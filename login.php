<?php 
session_start(); 
 
//ע����¼ 
if($_GET['action'] == "logout"){ 
unset($_SESSION['id']); 
unset($_SESSION['name']); 
echo 'ע����¼�ɹ�������˴� <a href="login.html">��¼</a>'; 
exit; 
} 



//��¼ 
if(!isset($_POST['submit'])){ 
exit('�Ƿ�����!'); 
}
 
$name = htmlspecialchars($_POST['name']); 
$password = MD5($_POST['password']); 

//�������ݿ������ļ� 
include('conn.php');
//����û����������Ƿ���ȷ 
$check_query = mysql_query("select id from contact where name='$name' and password='$password' limit 1"); 
if($result = mysql_fetch_array($check_query)){ 
//��¼�ɹ� 
$_SESSION['name'] = $name; 
$_SESSION['id'] = $result['id']; 
echo $name,' ��ӭ�㣡���� <a href="displayDB.php">�û�����</a><br />'; 
echo '����˴� <a href="login.php?action=logout">ע��</a> ��¼��<br />'; 
exit; 
} else { 
exit('��¼ʧ�ܣ�����˴� <a href="javascript:history.back(-1);">����</a> ����'); 
} 
?> 