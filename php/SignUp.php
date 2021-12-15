<?php

    session_start();
        include_once "config.php";
        $fname =  mysqli_real_escape_string($conn,$_POST['First_Name']);
        $lname =  mysqli_real_escape_string($conn,$_POST['Last_Name']);
        $Email =  mysqli_real_escape_string($conn,$_POST['Email']);
        $password =  mysqli_real_escape_string($conn,$_POST['Password']);
        if(!empty($fname) && !empty($lname) && !empty($Email) && !empty($password)){
            if(filter_var($Email,FILTER_VALIDATE_EMAIL)){
                $sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$Email}'");
                if(mysqli_num_rows($sql) > 0){
                    echo $Email . " This Is Email already exsit!!";
                }else{
                    if(isset($_FILES["image"])){
                        $img_name = $_FILES["image"]["name"];
                        $img_type = $_FILES["image"]["type"];
                        $tmp_name = $_FILES["image"]["tmp_name"];
                        $img_explode = explode(".",$img_name);
                        $img_ext = end($img_explode);
                        $extensions = ["jpg","png","jpeg"];
    
                        if(in_array($img_ext,$extensions) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"../images/".$new_img_name)){
                                $status = "Active Now";
                                $random_id = rand(time(),10000000);
                                $sql2 = mysqli_query($conn,"INSERT INTo users(unique_id,fname,lname,email,password,img,status) 
                                         VALUES({$random_id}, '{$fname}', '{$lname}', '{$Email}','{$password}','{$new_img_name}','{$status}')");
                            if ($sql2){
                               $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$Email}'");
                               if(mysqli_num_rows($sql3) > 0){                                
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row["unique_id"];
                                    echo "success";
                                    echo $row["unique_id"];
                               }
                            }else{
                                echo "Something Went Wrong!";
                            }
                        }
                            
                        }else{
                            echo  "Please Select an image File - jpg or png or jpeg";
                        }
                    }else{
                        echo  "Please Select an image File!";
                    }
                }
    
            }else{
                echo "$Email - this is not a valid!";
            }
        }else{
            echo "All input field are required!";
        }
