<?php include_once "header.php" ?>

<body>
    <link rel="stylesheet" href="css/saher.css">
    <?php
    include_once "php/config.php";
    $w = "SELECT * FROM users WHERE unique_id = '{$_GET['user_id']}'";
    $sql = mysqli_query($conn, $w);
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    }
    ?>
    <section class="chat" data-id="<?php echo $_GET['user_id'] ?>" data-name="<?php echo $_GET['Name']; ?>">
        <div class="head" data-id="<?php echo $_GET['Back'] ?>">
            <a href="users.php?user_id=<?php echo $_GET['Back'] ?>"><i class="fa fa-arrow-left"></i></a>
            <div>
                <img src="images/<?php echo $row['img'] ?>" alt="">
                <div>
                    <h5><?php echo $row["fname"] . " " . $row["lname"]; ?></h5>
                    <span><?php echo $row["status"]; ?></span>
                </div>
            </div>
        </div>
        <div class="body">
        </div>
        <div class="foot">
            <input type="text" placeholder="Enter Your Massage">
            <button><i class="fa fa-send"></i></button>
        </div>
    </section>
    <script src="js/jquery.js"></script>
    <script src="js/saher.js"></script>
</body>

</html>