<?php 
if(!isset($_POST['submit'])){ 
exit('�Ƿ�����!'); 
} 
$name = $_POST['name']; 
$password = $_POST['password']; 
$email = $_POST['email']; 
$sex=$_POST['sex'];
$phone_no=$_POST['phone_no'];
$QQ=$_POST['QQ'];
$weibo=$_POST['weibo'];
$twitterfacebook=$_POST['twitterfacebook'];
$working_com=$_POST['working_com'];
//ע����Ϣ�ж� 
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $name)){ 
exit('�����û��������Ϲ涨��<a href="javascript:history.back(-1);">����</a>'); 
} 
if(strlen($password) < 6){ 
exit('�������볤�Ȳ����Ϲ涨��<a href="javascript:history.back(-1);">����</a>'); 
} 
if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $email)){ 
exit('���󣺵��������ʽ����<a href="javascript:history.back(-1);">����</a>'); 
} 

//�������ݿ������ļ� 
include('conn.php'); 
//����û����Ƿ��Ѿ����� 
$check_query = mysql_query("select name from contact where name='$name' limit 1"); 
if(mysql_fetch_array($check_query)){ 
echo '�����û��� ',$name,' �Ѵ��ڡ�<a href="javascript:history.back(-1);">����</a>'; 
exit; 
} 
//д������ 
$password = MD5($password); 
#$regdate = time(); 
$sql = "INSERT INTO contact(name,password,email,sex,phone_no,QQ,weibo,twitterfacebook,working_com,register_time)VALUES('$name','$password','$email','$sex','$phone_no','$QQ','$weibo','$twitterfacebook','$working_com',
now())"; 
if(mysql_query($sql,$conn)){ 
exit('�û�ע��ɹ�������˴� <a href="login.html">��¼</a>'); 
} else { 
echo '��Ǹ���������ʧ�ܣ�',mysql_error(),'<br />'; 
echo '����˴� <a href="javascript:history.back(-1);">����</a> ����'; 
} 
?>