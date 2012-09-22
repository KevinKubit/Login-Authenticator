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
if (isset($_COOKIE['username']))
{
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];

$check1 = "SELECT * FROM $tbl_name WHERE username = '$username' AND password = '$password'";
$check2 = mysql_query($check1) or die(mysql_error());

//Counts result, if not valid redirects	
$user_count = mysql_num_rows($check2);

	if ($user_count == 0) {
		header("location:login.php");
	}
}
//If no cookie present, redirects
else
{
header("location:login.php");
}


?>

<?php
if (isset($_COOKIE['username']))
{
echo "Logged in as " . $_COOKIE['username'];
}
?>
<br />
<br />


<html>
<body>
<p>Welcome to the secure page, if you are viewing this without logging in, then this shit is broke</p>
<br />
<a href=logout.php>Click here to logout</a>
<br />
<a href=index.html>Return to the index</a>
</body>
</html>
