<?php

session_start();

if(!session_is_registered(username)){
header("location:login.php");
}

?>

<html>
<body>
Login Successful
<a href=secure1.php>Click here to go to the secure page</a>
</body>
</html>
