<?php 
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn,$_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' or lname  LIKE '%{$searchTerm}%'");
       
    if (mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '
                <a href="chat.php?user_id='.$row["unique_id"].'">
                    <div class="friend">
                        <img src="images/'.$row['img'].'" alt="">
                        <div>
                            <h5>'.$row["fname"]. " " . $row["lname"].'</h5>
                            <span>'.$row["status"].'</span>
                        </div>
                    </div>
                </a>
            ';
        }
    }else{
        $output .= "<p>No User Found related To Your Search Trem</p>";
    }
    echo $output;
