<?php 
// Connect to database, select db

mysql_connect("localhost", "insert_username", "insert_password") or die(mysql_error()); 

mysql_select_db("Database_Name") or die(mysql_error()); 


//starts if submitted

if (isset($_POST['submit'])) { 



//make sure fields not blank

if (!$_POST['r_user'] | !$_POST['r_pass'] | !$_POST['r_pass2'] ) {

		die('You did not complete all of the required fields');

 	}



// checks if the username already existrs

$r_usercheck = $_POST['r_user'];

$check = mysql_query("SELECT username FROM users WHERE username = '$r_usercheck'") 

or die(mysql_error());

$check2 = mysql_num_rows($check);



 //error for username in use

 if ($check2 != 0) {

 		die('Sorry, the username '.$_POST['r_user'].' is currently in use.');

 				}


//this makes sure both passwords entered match

 	if ($_POST['r_pass'] != $_POST['r_pass2']) {

 		die('Your passwords did not match. ');

 	}



 	// here we encrypt the password. RESEARCH ADDSLASHES wtf is that for(doesnt work right now)

 	//$_POST['pass'] = md5($_POST['pass']);


 			}



	//insert new user in db

 	$insert = "INSERT INTO users (username, password)

 			VALUES ('".$_POST['r_user']."', '".$_POST['r_pass']."')";

 	$add_member = mysql_query($insert);

 	?>



 
 <h1>Registered</h1>

 <p>Thank you, you have registered - you may now login</a>.</p>
