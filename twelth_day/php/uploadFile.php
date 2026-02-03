<?php
if (isset($_FILES['fileupload'])) {

    $target_path = "C:/xampp1/htdocs/";
    $target_path .= basename($_FILES['fileupload']['name']);

    if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $target_path)) {
        echo "File uploaded successfully!";
    } else {
        echo "Upload failed!";
    }

} else {
    echo "No file selected!";
}
?>
