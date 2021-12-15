<?php 
    $conn = mysqli_connect("localhost","root","","chat");
    if (!$conn) {
        echo "DataBase connercted" . mysqli_connect_error();
    }
