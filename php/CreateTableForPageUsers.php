<?php 
    include_once "config.php";    
    if (isset($_POST['createTable'])) {

        $createTable =  mysqli_real_escape_string($conn,$_POST['createTable']);

        $two = "chat" . $createTable;
        echo $two;
        mysqli_query($conn,"CREATE TABLE {$two} (id int auto_increment primary key,textChat varchar(1000) NOT NULL, NameUsers varchar(255))");
    }
