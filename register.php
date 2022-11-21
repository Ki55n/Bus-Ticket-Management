<?php

session_start();

include 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $password = md5($_POST['pass']);
    $sql = "SELECT * FROM users WHERE Email = '$email'";
    $result = mysqli_query($link, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO users (Name, Email,Phone_Number, Password) VALUES ('$username','$email','$phno','$password')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            echo "<script> alert('User Registration Successfull') </script>";
            echo "<script> window.location.href = 'index.php' </script>";
            $username = "";
            $email = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
        } else {
            echo "<script> alert('Oops! Something went Wrong') </script>";
        }
    } else {
        echo "<script> alert('Oops! User Already Exists.') </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus Ticket Management</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/blobz.min.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                    <h2 class="login100-form-title-1 mb-3">Bus Ticket Booking System</h2>
                    <span class="login100-form-title-1">
                        Sign Up
                    </span>
                </div>

                <form class="login100-form validate-form pb-3" method="POST" enctype="multipart/form-data">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
                        <span class="label-input100">Name</span>
                        <input class="input100" type="text" name="name" placeholder="Enter Name">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Phone Number is required">
                        <span class="label-input100">Phone Number</span>
                        <input class="input100" type="number" name="phno" placeholder="Enter Phone Number">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="pass" placeholder="Enter Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="mt-3 container-login100-form-btn">
                        <button name="submit" class="text-center mx-auto login100-form-btn">
                            Register
                        </button>
                    </div>
                    <a href="index.php" class="mt-4 text-center mx-auto">
                        <span>Click Here to Login</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
    </section>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>

</body>

</html>