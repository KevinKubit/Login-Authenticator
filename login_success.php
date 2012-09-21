<?php

// Insert variables for login and db and tbl selection
$host        = "localhost";  // Host name
$sqlusername = "root";       // Mysql username
$sqlpassword = "Buick";      // Mysql password
$db_name     = "users";      // Database name
$tbl_name    = "users";      // Table name

// Connect to server and select database.
mysql_connect("$host", "$sqlusername", "$sqlpassword")or die("cannot connect to mysql");
mysql_select_db("$db_name")or die("cannot select DB");

//Checks for a cookie, if there is one, then it GETS THOSE COOKIES
if(isset($_COOKIE['site_ID']))
{
$username = $_COOKIE['site_ID'];
$password = $_COOKIE['site_key'];

$check1 = "SELECT * FROM $tbl_name WHERE username = '$username'";
$check2 = mysql_query($check1) or die(mysql_error());
	
	while($info = mysql_fetch_array($check2))
	{
		if($password != $info['password'])
		{
		header("location:login.php");
		}
	}
}


/*

session_start();

if(!session_is_registered(username)){
header("location:login.php");
}

*/

?>

<html>
<body>
Login Successful
<br />
<a href=secure1.php>Click here to go to the secure page</a>
<br />
<a href=logout.php>Click here to logout</a>
</body>
</html>
