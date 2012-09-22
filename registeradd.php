<?php 

// Insert variables for login and db and tbl selection

$host        = "localhost";  // Host name
$sqlusername = "root";       // Mysql username
$sqlpassword = "Buick"; // Mysql password
$db_name     = "users";      // Database name
$tbl_name    = "users";      // Table name
$r_user      = $_POST['r_user'];
$r_pass      = $_POST['r_pass'];
$r_pass2     = $_POST['r_pass2'];



// Connect to database, select db

mysql_connect("$host", "$sqlusername", "$sqlpassword") or die("cannot connect"); 

mysql_select_db("$db_name") or die("cannot connect to database"); 


//starts if submitted

if (isset($_POST['submit'])) { 

	//make sure fields not blank

	if ( !$_POST['r_user'] | !$_POST['r_pass'] | !$_POST['r_pass2'] ) {

		die('You did not complete all of the required fields<br /><a href=registerform.php>Go back</a>');

 	}



	// checks if the username already exists

	$check = "SELECT username FROM $tbl_name WHERE username = '$r_user'";

	$check2 = mysql_query($check) or die(mysql_error());

	$row_count = mysql_num_rows($check2);



	// Error for username in use

	if ($row_count != 0) {

 		die('Sorry, the username '.$_POST['r_user'].' is currently in use.');

	}

	// This makes sure both passwords entered match

 	if ($_POST['r_pass'] != $_POST['r_pass2']) {

 		die('Your passwords did not match. ');

 	}


	function sanitize_username( $username ) {
	return preg_replace( '/[^a-z0-9]/i', '', $username );
	}

	$_POST['r_user'] = sanitize_username($_POST['r_user']);

	// Insert Taylors sanitize password function
 	// here we encrypt the password.


	function sanitize_password( $password ) {
	return preg_replace( '/[\t\'"%<>\-\(\)\n\r]/i', '', $password );
	}

	$hash_password = md5($_POST['r_pass']);
	$_POST['r_pass'] = sanitize_password($hash_password);


 


	// Insert Taylors sanitizing functions to sanitize username and password
	//insert new user in db

 	$insert = "INSERT INTO $tbl_name (username, password)

 			VALUES ('".$_POST['r_user']."', '".$_POST['r_pass']."')";

 	$add_member = mysql_query($insert);

?>



 
 <h1>Registered</h1>

 <p>Thank you, you have registered - <a href=login.php>you may now login</a>.</p>

<?php

}

else {

?>

<h4>Please select a username and password</h4>
<a href=login.php>Return to login</a>
<br />
<a href=index.html>Return to website</a>
<br />
<br />

 <form action="registeradd.php" method="post">

 <table border="0">

 <tr><td>Username:</td><td>

 <input type="text" name="r_user" maxlength="60">

 </td></tr>

 <tr><td>Password:</td><td>

 <input type="password" name="r_pass" maxlength="10">

 </td></tr>

 <tr><td>Confirm Password:</td><td>

 <input type="password" name="r_pass2" maxlength="10">

 </td></tr>

 <tr><th colspan=2><input type="submit" name="submit" 
value="Register"></th></tr> </table>

 </form>

<?php

}

?>
