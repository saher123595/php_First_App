<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            *{
                box-sizing: border-box;
                font-family: sans-serif;
                font-weight: 600;
                margin: 0;
            }
            body{
                background-color: #000;
            }
            textarea{
                width: 50%;
                margin: auto;
                display: block;
                height: 300px;
                outline: 0;
                padding: 10px;
            }
            form button{
                width: 262px;
                height: 42px;
                padding: 10px;
                display: flex;
                align-items: center;
                background: #e91e63;
                justify-content: center;
                color: #FFF;
                font-size: 20px;
                border: 0;
                border-radius: 50px;
                margin: 20px  auto;
                cursor: pointer;
            }
            form input{
                width: 50%;
                margin: 10px auto;
                display: block;
                height: 40px;
                outline: 0;
                padding: 10px;
            }
            .images{
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 50px 0 !important;
                flex-wrap: wrap;
            }
            img{
                width: 200px;
                height: 180px;
                margin: 10px;
                transition: .5s;
            }
            img.active{
                width: 300px;
                height: 280px;
                z-index: 1000;
            }
            input[name="FilePosition"]{
                color: #FFF;
                display: none;

            }
            label{
                width: 200px;
                height: 48px;
                background: #673ab7;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                color: #FFF;
                cursor: pointer;
                text-transform: capitalize;
                border-radius: 50px;
                position: relative;
                left: 50%;
                transform: translateX(-50%);
                margin: 20px 0;
            }
            .background{
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                transform: skew(-100deg);
                z-index: -1;
                transition: .8s;               
                background-position: center;
                background-repeat: repeat;
                background-size: cover;
                opacity: 0;
                
            }
            .background.active{
                z-index: 10000;
                opacity: 1;
                transform: skew(0);
            }
        </style>
    </head>
    <body>
    <?php
        // $text = "ail";
        // if ($_SERVER["REQUEST_METHOD"]=="POST") {
        //     $myFile = fopen('../css/main.css','r');
        //     $text = fread($myFile, filesize('../css/main.css'));
        // }


        // if (isset($_POST["btn"])) {
        //     $myFile = fopen($_POST["FileName"],'w');
        //     fwrite($myFile,$_POST["TextFile"]);
        //     fclose($myFile);
        // }


        #########Connect With DataBase###############
        $host = "localhost";
        $user = "root";
        $pass = "123456";
        $DB = "login";
        $conn = mysqli_connect($host,$user,$pass,$DB);
        

        if (isset($_POST["btn"])) {
            $FilePosition = $_FILES['FilePosition'];
            copy($FilePosition['tmp_name'], $FilePosition['name']);
            $insert = "insert into images values('".$FilePosition['name']."')";
            mysqli_query($conn,$insert);
        }
        $sql = 'SELECT * FROM images';
        $r = mysqli_query($conn,$sql);
        $rc = mysqli_num_rows($r);
    ?>
    <form method="POST" enctype="multipart/form-data">
        <!-- <textarea name="TextFile"></textarea>
        <input type="text" name="FileName" placeholder="File Name"> -->
        <label for="FilePosition">Upload image</label>
        <input type="file" name="FilePosition" id="FilePosition">

        <button type="submit" name="btn">Create And Write</button>
    </form>
        <div class="images">
            <?php
            if ($rc > 0) {
                while($row = mysqli_fetch_assoc($r)){
                    $NameImg = $row['Name_Images'];
                    echo "<img class=\"image\" src=\"$NameImg\">";
                }
            }
            ?>
        </div>
        <div class="background">
            
        </div>
        <script>
            let allImages = document.querySelectorAll("img.image");
            let DBackground = document.querySelector(".background");
            let i = -1;
            while(i < allImages.length-1){
                i++;
                allImages[i].onclick = function (){
                    
                    DBackground.classList.add("active");
                    DBackground.style.backgroundImage = 'url("'+this.src+'")';
                }
                DBackground.onclick = function (){
                    this.classList.remove("active");
                }            
            }
        </script>
    </body>
</html>