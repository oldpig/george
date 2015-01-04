<?php

session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['id'])){
	header("Location:login.html");
	exit();
}

$connection = mysql_connect("127.0.0.1", "george", "iamhgj");
if (mysql_error())
  echo "sorry, there was an errno: ";
$dbName = "contacts";  
mysql_select_db($dbName);
echo "<table cellspacing=\"10\">";
echo "<tr><td> ID </td><td> Name </td><td> E-mail </td></tr> ";

$tableName="contact";
$sql_stmt="SELECT * FROM $tableName";
$results = mysql_query($sql_stmt,$connection);
if(!$results) { die("No result\n"); }

while($row = mysql_fetch_array($results)) {
    echo "<tr><td>$row[id] </td><td> $row[name]</td> <td> $row[email] </td></tr>";
}
echo "</table>";
echo '<a href="login.php?action=logout">注销</a> 登录<br />';
mysql_close($connection);
?>