<?php
   $filePath = 'welcome.png';

// Set the Content-Type header to application/octet-stream
   header('Content-Type: application/octet-stream');

   // Set the Content-Disposition header to the filename of the downloaded file
   header('Content-Disposition: attachment; filename="'. basename($filePath).'"');

   // Read the contents of the file and output it to the browser.
   readfile($filePath);
?>