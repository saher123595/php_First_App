<?php 

    session_start();
    include_once "config.php";
    $Email =  mysqli_real_escape_string($conn,$_POST['email']);
    $password =  mysqli_real_escape_string($conn,$_POST['password']);

    if(!empty($Email) && !empty($password)){
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$Email}' AND password ='{$password}'");
        $sql2 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$Email}' AND password ='{$password}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row["unique_id"];      
            echo "success";
            echo $row["unique_id"];
            mysqli_query($conn,"UPDATE users SET status = 'Active Now' WHERE email ='" . $Email . "'");
        }else{
            echo "Email or Password Is incorrect";
        }
    }else{
        echo "All input field are required!";
    }
