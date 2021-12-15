<?php 
    session_start();
    include_once "config.php";

    $sql = mysqli_query($conn, "SELECT * FROM `friendship requests`");
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $koopId =  $_POST['koopId'];
            if($koopId == $row['user_two']){
                $one = $row['user_one'];
                $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$one}");
                while($row2 = mysqli_fetch_assoc($sql2)){
                    echo '
                    <li>        
                        <div class="friend">
                            <img src="images/'.$row2['img'].'" alt="">
                            <div>
                                <h5>'.$row2["fname"]. " " . $row2["lname"].'</h5>
                                <div>
                                    <button class="accept" data-del="'.$row["id"].'" data-id="'.$row2["unique_id"].'">accept</button>
                                    <button>refused</button>
                                </div>
                            </div>
                        </div>            
                    </li>
                ';
                }
            }
        }
    }else{
        echo "No friend requests";
    }
