<html>
<body>

<?php
$myfile = fopen("Hello.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("Hello.txt"));
fclose($myfile);
?>

</body>
</html>