<?php session_start();
include_once "header.php"; ?>
<?php
include_once "php/config.php";
$w = "SELECT * FROM users WHERE unique_id = '{$_GET['user_id']}'";
$id = $_GET['user_id'];
$sql = mysqli_query($conn, $w);
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}
?>

<body data-type="friends" class="pt-5 mt-5">
    <link rel="stylesheet" href="css/style.css">
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <nav class="navbar position-fixed top-0 w-100 navbar-expand-lg navbar-dark bg-dark p-lg-0 px-md-4 pt-md-1 pb-md-1">
        <div class="container-fluid p-0">
            <span class="navbar-brand ms-2"><img height="60px" src="./images/LogoMakr.png" alt=""></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-check"></i>
                        </a>
                        <ul class="dropdown-menu friend_request" data-bs-popper="none">

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-plus"></i>
                        </a>
                        <ul class="all_users dropdown-menu" data-bs-popper="none">

                        </ul>
                    </li>
                    <li class="nav-item dropdown d-flex mb-2">
                        <button id="LogOut" class="px-3"><i class="fa fa-sign-out-alt"></i></button>
                    </li>
                    <li class="nav-item dropdown d-flex mb-2 mx-lg-2 mx-md-0">
                        <button id="ToggleLight" class="px-3"><i class="fa fa-moon"></i></button>
                    </li>
                </ul>

                <ul class="p-0 m-0">
                    <li class="nav-item dropdown All">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="You">
                                <div class="YOU">
                                    <img src="images/<?php echo $row['img'] ?>" alt="">
                                    <div>
                                        <h5 data-id="<?php echo $row["unique_id"] ?>" data-name="<?php echo $row["fname"] ?>">
                                            <?php echo $row["fname"] . " " . $row["lname"]; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="AllDriends dropdown-menu" data-bs-popper="none">
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="head">
        <h5 data-id="<?php echo $row["unique_id"] ?>" data-name="<?php echo $row["fname"] ?>"></h5>
    </div>
    <section class="body">
        <div class="YourPost">
            <textarea id="Your_Message" class="one" placeholder="Enter <?php echo $row["fname"] ?> Your message"></textarea>
            <div>
                <button data-color="#ffeb3b" data-class="one"></button>
                <button data-color="#795548" data-class="two"></button>
                <button data-color="#ff5722" data-class="three"></button>
                <button data-color="#e91e63" data-class="four"></button>
            </div>
            <button id="send">Post</button>
        </div>
        <div class="Posts"></div>

    </section>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/jquery.js"></script>
</body>

</html>