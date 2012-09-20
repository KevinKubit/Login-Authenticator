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
<br />
<a href=index.html>Click here to return to the site</a>
<br />
<br />


<!--Below is for testing purposes only-->
<?php
echo "Check md5 hash below, change max length in db to 60";
?>

<form action="login.php" method="post">
<input type="text" name="md5" maxlength="60">
</form>

<?php
$_POST['md5'] = md5($_POST['md5']);
echo $_POST['md5']
?>



