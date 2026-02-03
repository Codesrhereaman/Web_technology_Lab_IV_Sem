<?php  
   $str1="PHP Scripting language";

   $str = <<<'newdoc'
   This is an example of Nowdoc string.
   it can span multiple lines
   and include single quote ' and double quotes "
   newdoc;

   echo $str."<br>";
   echo $str1
?>