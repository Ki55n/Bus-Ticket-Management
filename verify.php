<?php

session_start();

include 'config.php';

$name = $_SESSION['username'];
$email = $_SESSION['emailaddress'];
$otp = $_SESSION['sendotp'];
$date = $_SESSION['arridate'];

error_reporting();

if (isset($_POST['verify'])) {

    $otp = $_SESSION['sendotp'];
    $verotp = $_POST['newotp'];

    $seat = implode(",", $_SESSION['seatcount']);
    $from = $_SESSION['fromadd'];
    $to = $_SESSION['toadd'];
    $bid = rand(100000, 999999);
    $str = "BBTMSBID";
    $booking_id = $str . $bid;

    if ($otp == $verotp) {
        $sql = "INSERT INTO tickets (`From`, `To`, `Seat_Number`, `Booking_ID`,`Arrival_Date`, `OTP`, `Email`) VALUES ('$from','$to','$seat','$booking_id','$date','$verotp','$email')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            echo "<script>alert('Ticket Booking Successfull')</script>";
            echo "<script>window.location.href = 'home.php'</script>";
        } else {
            echo "<script>alert('Something Went wrong')</script>";
        }
    } else {
        echo "<script>alert('Invaild OTP')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Management</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <h1>BTBS<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="home.php" class="active">Home</a></li>
                    <li><a href="history.php">Recent Booking</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>

    <div class="content">

        <div class="container" style="margin-bottom: -50px;">
            <h3 class="text-center mb-5 font-weight-bold" style="margin-top: -50px;">Hello, Welcome <?php echo $name ?></h3>
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-12">
                    <div class="form h-100">
                        <h3>Verify One Time Passcode <?php echo $otp ?></h3>
                        <form class="mb-5" method="post">
                            <div class="form-group mb-3">
                                <label for="" class="col-form-label">OTP *</label>
                                <input type="number" class="form-control" name="newotp" id="name" required placeholder="OTP Sent to Your Email">
                            </div>
                            <div class="mx-auto form-group mb-2">
                                <center>
                                    <button class=" mt-4 btn btn-primary" type="submit" name="verify">Verify OTP</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>