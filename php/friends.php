<?php 
    session_start();
    include_once "config.php";
    $id1 = $_POST['From'][0];
    $id2 = $_POST['From'][1];
    $sql = mysqli_query($conn, "INSERT INTO `friendship requests` (`user_one`, `user_two`) VALUES('{$id1}','{$id2}')");
