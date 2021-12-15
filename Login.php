<?php include_once "header.php" ?>

<body class="bodyAother">
    <link rel="stylesheet" href="css/signUpAndLogin.css">
    <form action="" method="POST">
        <h2 class="text-capitalize">realtiem chat app</h2>
        <hr>
        <div class="error"></div>
        <div class="All">
            <h5>Email Address</h5>
            <input type="Email" class="Input" name="email" placeholder="Enter Your Email" required>
        </div>
        <div class="All">
            <h5>Password</h5>
            <input type="Password" class="Input" name="password" placeholder="Enter Your Password" required>
            <button type="button"><i class="fas fa-eye"></i></button>
        </div>
        <div>
            <input type="submit" class="continue" value="continue to chat">
        </div>
        <p>not yet signed up?
            <a href="index.php">Signup now</a>
        </p>
    </form>
    <script src="js/index.js"></script>
    <script src="js/login.js"></script>
</body>

</html>