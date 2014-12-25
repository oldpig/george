<?php
$connection = mysql_connect("127.0.0.1", "george", "iamhgj");
if (mysql_error())
    echo "sorry, there was an errno: ";
echo "Connection succeeded.";
mysql_select_db('contacts');
if (isset($_GET["name"])) {
    $name = $_GET["name"];
    echo $name;
} else {
    echo "name is empty";
}

if (isset($_GET["email"])) {
    $email=$_GET["email"];
    echo $email;
} else {
    echo "email is empty";
}
$tableName = "contact";
$sql_stmt = "INSERT INTO $tableName(name, email) VALUES('$name','$email')";
$retval = mysql_query($sql_stmt, $connection);
if(!$retval)
{
  die('Could not enter data: ' . mysql_error());
}
echo "An entry has been added";
mysql_close($connection);

?>