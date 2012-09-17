<?php


    // Insert variables for login and db and tbl selection
    $host="localhost"; // Host name
    $sqlusername="root"; // Mysql username
    $sqlpassword="insert_password"; // Mysql password
    $db_name="users"; // Database name
    $tbl_name="users"; // Table name
    $username=$_POST['username'];
    $password=$_POST['password']; 

    // Connect to server and select databse.
    mysql_connect("$host", "$sqlusername", "$sqlpassword")or die("cannot connect to mysql");
    mysql_select_db("$db_name")or die("cannot select DB");

// If the form has been submitted
if (isset($_POST['submit'])) {



 	// makes sure they filled it in
 	if(!$_POST['username'] | !$_POST['password']) {

 		die('You did not fill in a required field, <a href=login.php>Click here to return to the login page</a>');

 	}

 
    // Sanitize the username.  Otherwise could mess up the db query or inject something hazardous, must escape with username values
    $safe_username = mysql_real_escape_string($_POST['username']);
 
    // Tried md5 32 bit hash but didnt work, used escape instead but ISNT SAFE???
    $safe_password = mysql_real_escape_string($_POST['password']);




//New code below, check through


	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());



	//Gives error if user dosen't exist
	$check2 = mysql_num_rows($check);

	if ($check2 == 0) {

 		die('That user does not exist in our database. <a href=login.php>Click Here to return to the login</a>');

 	}

 	while($info = mysql_fetch_array( $check )) {


	$_POST['password'] = stripslashes($_POST['paswords']);

 	$info['password'] = stripslashes($info['password']);

 	$_POST['pass'] = md5($_POST['pass']);



		//gives error if the password is wrong

 		if ($_POST['password'] != $info['password']) {

 		die('Incorrect password, please try again.');

 		}
	//uses else to contradict not equal, add login success statement below
	else
	}





//New code starts here, check through the above (functionality added to distinguish between incorrect username or incorrect password)








 
    // Run the query.  It will return a result if I get have a match
    $sql="SELECT * FROM $tbl_name WHERE username='$safe_username' and password='$safe_password'";
    $result=mysql_query($sql);
 
    // Count the returned rows
    $count=mysql_num_rows($result);

        // If result matched $username and $password, table row must be 1 row
        if($count==1){

        // Register $myusername, $mypassword and redirect to file "login_success.php"
        session_register("username");
        session_register("password");
        header("location:login_success.php");
        }
        else {
        echo "Wrong Username or Password";
        }
 
    // Halt execution of code.
    exit;
}
 
?>
