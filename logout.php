 <?php 

 $past = time() - 100; 

 //this makes the time in the past to DESTROY THEM COOKIES

 setcookie(site_ID, gone, $past); 

 setcookie(site_key, gone, $past); 

 header("Location: login.php"); 

 ?> 
