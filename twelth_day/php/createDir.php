<?php
	    $output_dir=" ";
            $dir_name=$_POST['createDir'];
	    
            if (!file_exists($output_dir . $dir_name))/* Check folder exists or not */
			{
				@mkdir($output_dir . $dir_name);/* Create folder by using mkdir function */
	            echo "Folder Has Created";/* Success Message */
			}
?>