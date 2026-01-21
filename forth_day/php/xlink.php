<?php
$xml = simplexml_load_file("xLink.xml");

// Register XLink namespace
$xml->registerXPathNamespace("x", "http://www.w3.org/1999/xlink");

echo "<h2>Books with XLink</h2>";

foreach ($xml->book as $book) {
    $title = $book->title;
    $link = $book->info->attributes("http://www.w3.org/1999/xlink")->href;

    echo "<a href='$link'>$title</a><br>";
}
?>