<?php
$file = fopen("newname.txt","w");
echo fwrite($file,"Hello File is Deleted!");
fclose($file);
unlink("newname.txt");
?>