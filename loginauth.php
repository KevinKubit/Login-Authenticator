<?php

// Added by Taylor to prevent double login, check through using index and utils
//if ( is_logged_in() )
//exit( 'You are already logged in!!' );



// Insert variables for login and db and tbl selection
$host        = "localhost";  // Host name
$sqlusername = "root";       // Mysql username
$sqlpassword = "Buick";      // Mysql password
$db_name     = "users";      // Database name
$tbl_name    = "users";      // Table name


// Connect to server and select database.
mysql_connect("$host", "$sqlusername", "$sqlpassword")or die("cannot connect to mysql");
mysql_select_db("$db_name")or die("cannot select DB");


// If the form has been submitted
if (isset($_POST['submit'])) {


 	// makes sure they filled it in
 	if(!$_POST['username'] | !$_POST['password']) {

		die('You did not fill in a required field <br /><br /> <a href=login.php>Click here to return to the login page</a>');

 	}

 
// Sanitize the username.  Otherwise could mess up the db query or inject something hazardous

function sanitize_username( $username ) {
return preg_replace( '/[^a-z0-9]/i', '', $username );
}

$safe_username = sanitize_username($_POST['username']);



//Need to do the following below after register new user is setup

function sanitize_password( $password ) {
return preg_replace( '/[\t\'"%<>\-\(\)\n\r]/i', '', $password );
}

$hash_password = md5($_POST['password']);
$safe_password = sanitize_password($hash_password);



//Check for username

$user_check1 = "SELECT * FROM $tbl_name WHERE username = '$safe_username'";
$user_check2 = mysql_query($user_check1) or die(mysql_error());


//Counts rows from result above and gives user error if user dosen't exist

$user_count = mysql_num_rows($user_check2);

	if ($user_count == 0) {

		die('That user does not exist in our database.<br /><br /> <a href=login.php>Click here to login</a>');

	}

 	while($info = mysql_fetch_array( $user_check2 )) {



		//gives error if the password is wrong

 		if ($safe_password != $info['password']) {

 		die('Incorrect password, please try again.<br /><br /> <a href=login.php>Click here to login</a>');

 		}

		//uses else to contradict not equal and redirect to success page
		//Should I use sessions or cookies? Uncomment sessions if not cookies

		else {

 	 	$hour = time() + 3600; 

 		setcookie(username, $safe_username, $hour); 

 		setcookie(password, $safe_password, $hour);	 

		header("location:login_success.php");
		}
	}
exit;
}





/**Original code from version 0 below that ONLY returns wrong username OR password error
  *Good to prevent malicious users from knowing if a certain username exists
  *Incorporate if needed and comment above strings
  */
 
//Run the query.  It will return a result if I get have a match
//$sql="SELECT * FROM $tbl_name WHERE username='$safe_username' and password='$safe_password'";
//$result=mysql_query($sql);
 
//Count the returned rows
//$count=mysql_num_rows($result);

	// If result matched $username and $password, table row must be 1 row
	//if($count == 1){

	// Register $myusername, $mypassword and redirect to file "login_success.php"
	//session_register("username");
	//session_register("password");
	//header("location:login_success.php");
	//}
		//else {
		//echo "Wrong Username or Password";
		//}
 
	// Halt execution of code.
	//exit;
//}
 
?>
