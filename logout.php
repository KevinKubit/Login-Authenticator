 <?php 

 $past = time() - 100; 

 //this makes the time in the past to DESTROY THEM COOKIES

 setcookie(username, gone, $past); 

 setcookie(password, gone, $past); 

 header("Location: login.php"); 

 ?> 
