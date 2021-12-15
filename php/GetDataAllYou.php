<?php

session_start();
include_once "config.php";

$sql = mysqli_query($conn, "SELECT * FROM `accept friends`");
while ($row = mysqli_fetch_assoc($sql)) {
    $koopId =  $_POST['koopId'];
    if ($koopId == $row['user_one_id']) {
        $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$row['user_two_id']}");
        while ($row2 = mysqli_fetch_assoc($sql2)) {
            echo '                                        
                <li data-equel="' . $row2["unique_id"] . '">                            
                    <div class="friend">
                        <img src="images/' . $row2['img'] . '" alt="">
                        <div>
                            <h5>' . $row2["fname"] . " " . $row2["lname"] . '</h5>                                
                            <div style="justify-content: space-between;">
                                <span>' . $row2["status"] . '</span> 
                                <button class="btnDel" data-del1="' . $row['id'] . '">cancel</button>
                                <a href="" data-go="' . $row2["unique_id"] . '" data-name="' . $row2["fname"] . '">
                                    <button><i class="fa fa-comment-alt"></i></button>
                                </a>  
                            </div>
                        </div>
                    </div>                             
                </li>
            ';
        }
    } elseif ($koopId == $row['user_two_id']) {
        $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$row['user_one_id']}");
        while ($row2 = mysqli_fetch_assoc($sql2)) {
            echo '            
                <li data-equel="' . $row2["unique_id"] . '">                 
                    <div class="friend">
                        <img src="images/' . $row2['img'] . '" alt="">
                        <div>
                            <h5>' . $row2["fname"] . " " . $row2["lname"] . '</h5>                                
                            <div style="justify-content: space-between;">
                                <span>' . $row2["status"] . '</span> 
                                <button class="btnDel" data-del1="' . $row['id'] . '">cancel</button>
                                 <a href="" data-go="' . $row2["unique_id"] . '" data-name="' . $row2["fname"] . '">
                                    <button><i class="fa fa-comment-alt"></i></button> 
                                 </a>  
                            </div>
                        </div>
                    </div>                      
                </li>
            ';
        }
    }
}
