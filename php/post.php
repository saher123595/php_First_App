<?php 
include_once "config.php";
session_start();


$sql = mysqli_query($conn, "SELECT * FROM post");    
$result = "";
$Data = "";
while($row = mysqli_fetch_assoc($sql)){
    $id = $row["unique_id"];
    $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$id}");          
        while($row2 = mysqli_fetch_assoc($sql2)){
            echo "
                <div class=\"post\" data-from=\"".$row['Id_Post']."\">
                    <div class=\"head\">
                        <img src=\"images/".$row2["img"]."\" />
                        <div>
                            <h5>".$row2["fname"] . " ". $row2["lname"]."</h5>
                        </div>
                    </div>
                    <div class=\"body\">
                    <p class=\"".$row["class"]."\"> ".$row["TextMessage"]." </p>
                    </div>
                    <div class=\"foot\">
                        <button data-up=\"".$row["id"]."\"><i class=\"fa fa-thumbs-up\"></i> <span>".$row["likes"]."</span> </button>
                    </div>
                    <div class=\"comments\">
                        <div class=\"comment\">
                        
            ";
            
            $sql3 = mysqli_query($conn,"SELECT * FROM `comments` WHERE Post_Id = {$row['Id_Post']}");
            while($Row4 = mysqli_fetch_assoc($sql3)){
                $sql4 = mysqli_query($conn,"SELECT * FROM `users` WHERE unique_id  = {$Row4['User_Id']}");
                while($Row3 = mysqli_fetch_assoc($sql4)){      
                    echo "
                    <div>
                        <img src=\"images/".$Row3['img']."\" />
                        <div>
                            <h5>".$Row3['fname'] . " " . $Row3['lname'] ."</h5>
                            <p>".$Row4['Comment_Text']."</p>
                        </div>
                    </div>
                    ";                                                    
                }
            }

            echo "
                </div>
                <div class=\"write\">
                    <textarea placeholder=\"Enter Your Comment\"></textarea>
                    <button><i class=\"fa fa-send\"></i></button>
                </div>
                </div>
            </div>
            ";
        }        
}
if(isset($_POST['Likes'])){
    $Like = $_POST['Likes'];
    $Num = $_POST['Num'];
    mysqli_query($conn,"UPDATE `post` SET `likes`= $Num WHERE  `id` = $Like");
}

if(isset($_POST['From'][0])){
    $unique_id = $_POST['From'][0];
    $Text = $_POST['From'][1];
    $Class = $_POST['From'][2];
    $Id = time();
    $two = $Id;
    mysqli_query($conn,"INSERT INTO `post`(`Id_Post`,`unique_id`, `TextMessage`, `class`, `likes`) VALUES ( {$two} ,{$unique_id},'{$Text}','{$Class}',0) "); 
}
