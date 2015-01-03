<?php 
if(!isset($_POST['submit'])){ 
exit('非法访问!'); 
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
//注册信息判断 
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $name)){ 
exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>'); 
} 
if(strlen($password) < 6){ 
exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>'); 
} 
if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $email)){ 
exit('错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a>'); 
} 

//包含数据库连接文件 
include('conn.php'); 
//检测用户名是否已经存在 
$check_query = mysql_query("select name from contact where name='$name' limit 1"); 
if(mysql_fetch_array($check_query)){ 
echo '错误：用户名 ',$name,' 已存在。<a href="javascript:history.back(-1);">返回</a>'; 
exit; 
} 
//写入数据 
$password = MD5($password); 
#$regdate = time(); 
$sql = "INSERT INTO contact(name,password,email,sex,phone_no,QQ,weibo,twitterfacebook,working_com,register_time)VALUES('$name','$password','$email','$sex','$phone_no','$QQ','$weibo','$twitterfacebook','$working_com',
now())"; 
if(mysql_query($sql,$conn)){ 
exit('用户注册成功！点击此处 <a href="login.html">登录</a>'); 
} else { 
echo '抱歉！添加数据失败：',mysql_error(),'<br />'; 
echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试'; 
} 
?>