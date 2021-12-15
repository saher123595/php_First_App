<?php 
    session_start();
    
    include_once "config.php";
    $ThisNot = $_POST['ThisNot'];    
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$ThisNot}");
    $output = "";

    while($row = mysqli_fetch_assoc($sql)){
        $output .= '
        <li data-id="'.$row["unique_id"].'">            
            <div class="friend">
                <img src="images/'.$row['img'].'" alt="">
                <div>
                    <h5>'.$row["fname"]. " " . $row["lname"].'</h5>
                    <button>Add friend</button>
                </div>
            </div>            
        </li>
    ';
    }

    echo $output;
