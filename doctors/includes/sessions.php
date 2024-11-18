<?php
if (!isset($_SESSION["docid"])) {
    echo '<script>location.replace("index.php");</script>';
    exit();
} else {
    $docid = $_SESSION["docid"];
}
