<?php 

    session_start();
    include_once "config.php";
    $Del1 = $_POST['Del1'];
    mysqli_query($conn, "DELETE FROM `accept friends` WHERE id = $Del1");
