<?php 
    session_start();
    include_once "config.php";

    if(isset($_POST['From'])){
        $From = mysqli_real_escape_string($conn,$_POST['From']);
        $result = mysqli_query($conn,"UPDATE users SET status = 'Not Active' WHERE unique_id ='" . $From . "'");
    }
