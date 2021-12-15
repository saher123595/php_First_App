<?php 

    include_once "config.php";
    session_start();

    if(isset($_POST['All'][0])){
        $Post_Id = $_POST['All'][0];
        $User_Id = $_POST['All'][1];
        $Comment_Text = $_POST['All'][2];
        mysqli_query($conn,"INSERT INTO `comments`(`Post_Id`, `User_Id`, `Comment_Text`) VALUES ('{$Post_Id}','{$User_Id}','{$Comment_Text}')"); 
    }
