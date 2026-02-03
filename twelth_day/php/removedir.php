<?php
if (is_dir(" Amab ji"))
{
    rmdir(" Amab ji");
    echo "Directory removed successfully.";
}
else
{
    echo "Directory does not exist.";
}
?>