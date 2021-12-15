<?php include_once "header.php" ?>


<body class="bodyAother">
    <link rel="stylesheet" href="css/signUpAndLogin.css">
    <form action="" method="POST" enctype="multipart/form-data">
        <h2 class="text-capitalize">realtiem chat app</h2>
        <hr>
        <div class="error"></div>
        <div class="AllInput">
            <div class="FirstName">
                <h5>First Name</h5>
                <input type="text" class="Input" name="First_Name" placeholder="First_Name" required>
            </div>
            <div class="LastName">
                <h5>Last Name</h5>
                <input type="text" class="Input" name="Last_Name" placeholder="Last_Name" required>
            </div>
        </div>
        <div class="All">
            <h5>Email Address</h5>
            <input type="Email" class="Input" name="Email" placeholder="Enter Your Email" required>
        </div>
        <div class="All">
            <h5>Password</h5>
            <input type="Password" class="Input" name="Password" placeholder="Enter Your Password" required>
            <button type="button"><i class="fas fa-eye"></i></button>
        </div>
        <div class="All">
            <h5>select image</h5>
            <input type="file" id="File" name="image" required>
            <label for="File">Upload image</label>
        </div>
        <div>
            <input type="submit" class="continue" value="continue to chat">
        </div>
        <p>already signed up?
            <a href="Login.php">Login now</a>
        </p>
    </form>
    <script src="js/index.js"></script>
    <script src="js/SignUp.js"></script>
</body>

</html>