<?php  
function increment(&$i)  
{  
    $i++;  
}  
$i = 10;  
increment($i);  
echo $i;  
?>