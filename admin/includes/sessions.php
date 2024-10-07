<?php
if(!isset($_SESSION["chid"])){
    echo '<script>location.replace("index.php");</script>';
    exit ();
}else{
    $userid = $_SESSION["chid"];
}
?>