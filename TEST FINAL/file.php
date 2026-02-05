<?php
// Load XML file
$xml = simplexml_load_file("students.xml");

// Apply XPath
$result = $xml->xpath("/students/student[marks >=75]/name");

// Display result
echo "<h2>Top Students</h2>";
foreach ($result as $name) {
    echo $name . "<br>";
}
?>