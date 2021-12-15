<?php 

    include_once "../config.php";
    session_start();

    $arrayName = array(1638550329,1638550346);
    foreach($arrayName as $item){
        $sql = mysqli_query($conn,"SELECT * FROM `comments` WHERE Post_Id = {$item}");

        while($Row = mysqli_fetch_assoc($sql)){
            $sql2 = mysqli_query($conn,"SELECT * FROM `users` WHERE unique_id  = {$Row['User_Id']}");
            while($Row2 = mysqli_fetch_assoc($sql2)){     
                echo "<div>
                    <img src=\"../images/".$Row2['img']."\" />
                    <div>
                        <h5>".$Row2['fname'] . $Row2['lname'] ."</h5>
                        <p>".$Row['Comment_Text']."</p>
                    </div>
                </div>";
            }
        }
    }
