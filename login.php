<?php
// BELOW: programming for check cookie login for members

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
	
$user_count = mysql_num_rows($check2);

	if ($user_count == 1) {
		header("location:secure1.php");
	}
}

?>


<h4>Member Login</h4>
<p>New User? <a href=registerform.php>Click here to register!</a></p>
<br /> 


 <form action="loginauth.php" method="post">

 <table border="0">

 <tr><td>Username:</td><td>

 <input type="text" name="username" maxlength="60">

 </td></tr>

 <tr><td>Password:</td><td>

 <input type="password" name="password" maxlength="10">

 </td></tr>

 <tr><th colspan=2><input type="submit" name="submit" 
value="Login"></th></tr> </table>

 </form>
<br />
<a href=forgotpassword.php>Forgot your password?</a>
<br />
<br />
<a href=index.html>Click here to return to the site</a>
<br />
<br />





