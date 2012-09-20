<?php

session_start();

if(!session_is_registered(username)){
header("location:login.php");
}

?>

<html>
<body>
<p>Welcome to the secure page, if you are viewing this without logging in, then this shit is broke</p>
<br />
<a href=index.html>Return to the index</a>
</body>
</html>
