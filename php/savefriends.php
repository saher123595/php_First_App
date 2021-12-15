<?php 

    session_start();
    include_once "config.php";

    $id1 = $_POST['From'][0];
    $id2 = $_POST['From'][1];
    $Del = $_POST['From'][2];
    mysqli_query($conn, "INSERT INTO `accept friends` (`user_one_id`, `user_two_id`) VALUES('{$id1}','{$id2}')");
    mysqli_query($conn, "DELETE FROM `friendship requests` WHERE id = {$Del}");
