<?php 

    include_once "config.php";
    if(isset($_POST['TextChat'])){
        $TextChat = $_POST['TextChat'];
        $NameUsers = $_POST['NameUsers'];
        $NameTableDataBase = "chat" . $_POST['NameTableDataBase'];
        mysqli_query($conn,"INSERT INTO {$NameTableDataBase} (`textChat`, `NameUsers`) VALUES ('{$TextChat}','{$NameUsers}')");
    }

    $Users = "chat" . $_POST['Users'];
    $class = $_POST['class'];
    $sql = mysqli_query($conn,"SELECT * FROM $Users");
    $output = "";
    while($row = mysqli_fetch_assoc($sql)){
        if($class == $row['NameUsers']){
            echo "
            <div>
                <p class=\"one\" data-del=".$row['id'].">".$row['textChat']."</p>
            </div>
            ";
        }else{
            echo "
            <div>
                <p class=\"two\" data-del=".$row['id'].">".$row['textChat']."</p>
            </div>
            ";
        }
        
    }
