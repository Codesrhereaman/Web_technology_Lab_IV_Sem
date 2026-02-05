<?php
  echo "Setting Cookies:"."<br>";
     setcookie("user_name", "Rahul", time()+ 60,'/'); // expires after 60 seconds
     echo 'The cookie has been set for 60 seconds';
     
?>