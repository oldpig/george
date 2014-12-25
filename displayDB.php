<?php
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
mysql_close($connection);
?>