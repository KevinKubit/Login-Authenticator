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
$password2 = $_COOKIE['site_key'];
$password = md5($password2);

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
<p>Welcome to the secure page, if you are viewing this without logging in, then this shit is broke</p>
<br />
<a href=index.html>Return to the index</a>
</body>
</html>
