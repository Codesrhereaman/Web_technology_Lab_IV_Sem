<?php
// Load XML file
$xml = simplexml_load_file("bookstore.xml");

// XPath: select books whose price is greater than 350
$result = $xml->xpath("/bookstore/book[price > 350]");

echo "<h2>Books with Price greater than 450</h2>";

foreach ($result as $book) {
    echo "Title: " . $book->title . "<br>";
    echo "Price: " . $book->price . "<br><br>";
}
?>