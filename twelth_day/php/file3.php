<?php
$xml = new DOMDocument();
$xml->load("books2.xml");

$xpath = new DOMXPath($xml);
$books = $xpath->query("//book[price < 40]");

foreach ($books as $book) {
    $title = $book->getElementsByTagName("title")[0]->nodeValue;
    $price = $book->getElementsByTagName("price")[0]->nodeValue;

    echo "<strong>Title:</strong> $title <br>";
    echo "<strong>Price:</strong> $price <br><br>";
}
?>