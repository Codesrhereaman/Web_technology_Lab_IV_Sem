<?php 
class vehicle  
    {  
        function car()  
        { 
	$cars = [ 'VOLVO', 'BMW', 'TOATA' ];
	echo "Display All cars are:"."<br>";
	echo $cars[0]."<br>".$cars[1]."<br>".$cars[2]."<br>";           
        
        }  
    }  
    $obj = new vehicle;  
    $obj->car();   
?>