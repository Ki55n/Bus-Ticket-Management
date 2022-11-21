<?php

session_start();

include 'config.php';

$name = $_SESSION['username'];
$email = $_SESSION['emailaddress'];

error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['confirm'])) {

    require('PHPMailer/Exception.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/PHPMailer.php');

    $otp = rand(100000, 999999);
    $email = $_SESSION['emailaddress'];
    $_SESSION['sendotp'] = $otp;
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'applemac6364@gmail.com';
        $mail->Password   = 'oqnjiwuhnuqtajbt';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // $mail->setFrom($email, $name);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Verification Code';
        $mail->Body    = "Hello!, Your Verification code to confirm your Booking is <br><br> <h3>$otp</h3>, Thank You from Bus Ticket Booking Management System";

        if ($mail->send()) {
            echo "<script>alert('Email Sent to your Registered Email')</script>";
            echo "<script>window.location.href = 'verify.php'</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent! Mailer Error')</script>";
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
                        <h3>Book a Ticket</h3>
                        <form class="mb-5" method="post" id="contactForm" name="contactForm">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label">From Place *</label>
                                    <input type="text" class="form-control" name="from" id="name" required placeholder="Your From Place">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label">To Place *</label>
                                    <input type="text" class="form-control" name="to" id="email" required placeholder="Your To Place">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                    <label for="" class="col-form-label">Arrival Date *</label>
                                    <input type="date" class="form-control" name="date" id="email" required placeholder="Your Arrival Date">
                                </div><br>

                            <div class="row">
                                <div class="col-12">
                                    <form action="" method="post">
                                        <label>Select Your Seat *</label>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="1" name="seat[]" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">1</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="2" name="seat[]" class="custom-control-input" id="customCheck2">
                                                            <label class="custom-control-label" for="customCheck2">2</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="3" name="seat[]" class="custom-control-input" id="customCheck3">
                                                            <label class="custom-control-label" for="customCheck3">3</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="4" name="seat[]" class="custom-control-input" id="customCheck4">
                                                            <label class="custom-control-label" for="customCheck4">4</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="5" name="seat[]" class="custom-control-input" id="customCheck5">
                                                            <label class="custom-control-label" for="customCheck5">5</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="6" name="seat[]" class="custom-control-input" id="customCheck6">
                                                            <label class="custom-control-label" for="customCheck6">6</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="7" name="seat[]" class="custom-control-input" id="customCheck7">
                                                            <label class="custom-control-label" for="customCheck7">7</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="8" name="seat[]" class="custom-control-input" id="customCheck8">
                                                            <label class="custom-control-label" for="customCheck8">8</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="9" name="seat[]" class="custom-control-input" id="customCheck9">
                                                            <label class="custom-control-label" for="customCheck9">9</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="10" name="seat[]" class="custom-control-input" id="customCheck10">
                                                            <label class="custom-control-label" for="customCheck10">10</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="11" name="seat[]" class="custom-control-input" id="customCheck11">
                                                            <label class="custom-control-label" for="customCheck11">11</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="12" name="seat[]" class="custom-control-input" id="customCheck12">
                                                            <label class="custom-control-label" for="customCheck12">12</label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="13" name="seat[]" class="custom-control-input" id="customCheck13">
                                                            <label class="custom-control-label" for="customCheck13">13</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="14" name="seat[]" class="custom-control-input" id="customCheck14">
                                                            <label class="custom-control-label" for="customCheck14">14</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="15" name="seat[]" class="custom-control-input" id="customCheck15">
                                                            <label class="custom-control-label" for="customCheck15">15</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="16" name="seat[]" class="custom-control-input" id="customCheck16">
                                                            <label class="custom-control-label" for="customCheck16">16</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="17" name="seat[]" class="custom-control-input" id="customCheck17">
                                                            <label class="custom-control-label" for="customCheck17">17</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="18" name="seat[]" class="custom-control-input" id="customCheck18">
                                                            <label class="custom-control-label" for="customCheck18">18</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="19" name="seat[]" class="custom-control-input" id="customCheck19">
                                                            <label class="custom-control-label" for="customCheck19">19</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="20" name="seat[]" class="custom-control-input" id="customCheck20">
                                                            <label class="custom-control-label" for="customCheck20">20</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="21" name="seat[]" class="custom-control-input" id="customCheck21">
                                                            <label class="custom-control-label" for="customCheck21">21</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="22" name="seat[]" class="custom-control-input" id="customCheck22">
                                                            <label class="custom-control-label" for="customCheck22">22</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="23" name="seat[]" class="custom-control-input" id="customCheck23">
                                                            <label class="custom-control-label" for="customCheck23">23</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="24" name="seat[]" class="custom-control-input" id="customCheck24">
                                                            <label class="custom-control-label" for="customCheck24">24</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="25" name="seat[]" class="custom-control-input" id="customCheck25">
                                                            <label class="custom-control-label" for="customCheck25">25</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="26" name="seat[]" class="custom-control-input" id="customCheck26">
                                                            <label class="custom-control-label" for="customCheck26">26</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="27" name="seat[]" class="custom-control-input" id="customCheck27">
                                                            <label class="custom-control-label" for="customCheck27">27</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="28" name="seat[]" class="custom-control-input" id="customCheck28">
                                                            <label class="custom-control-label" for="customCheck28">28</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="29" name="seat[]" class="custom-control-input" id="customCheck29">
                                                            <label class="custom-control-label" for="customCheck29">29</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="30" name="seat[]" class="custom-control-input" id="customCheck30">
                                                            <label class="custom-control-label" for="customCheck30">30</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table><br>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="32" name="seat[]" class="custom-control-input" id="customCheck31">
                                                            <label class="custom-control-label" for="customCheck31">31</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="32" name="seat[]" class="custom-control-input" id="customCheck32">
                                                            <label class="custom-control-label" for="customCheck32">32</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="33" name="seat[]" class="custom-control-input" id="customCheck33">
                                                            <label class="custom-control-label" for="customCheck33">33</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="34" name="seat[]" class="custom-control-input" id="customCheck34">
                                                            <label class="custom-control-label" for="customCheck34">34</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="35" name="seat[]" class="custom-control-input" id="customCheck35">
                                                            <label class="custom-control-label" for="customCheck35">35</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="36" name="seat[]" class="custom-control-input" id="customCheck36">
                                                            <label class="custom-control-label" for="customCheck36">36</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="37" name="seat[]" class="custom-control-input" id="customCheck37">
                                                            <label class="custom-control-label" for="customCheck37">37</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="38" name="seat[]" class="custom-control-input" id="customCheck38">
                                                            <label class="custom-control-label" for="customCheck38">38</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="39" name="seat[]" class="custom-control-input" id="customCheck39">
                                                            <label class="custom-control-label" for="customCheck39">39</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="40" name="seat[]" class="custom-control-input" id="customCheck40">
                                                            <label class="custom-control-label" for="customCheck40">40</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="41" name="seat[]" class="custom-control-input" id="customCheck41">
                                                            <label class="custom-control-label" for="customCheck41">41</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="42" name="seat[]" class="custom-control-input" id="customCheck42">
                                                            <label class="custom-control-label" for="customCheck42">42</label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="43" name="seat[]" class="custom-control-input" id="customCheck43">
                                                            <label class="custom-control-label" for="customCheck43">43</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="44" name="seat[]" class="custom-control-input" id="customCheck44">
                                                            <label class="custom-control-label" for="customCheck44">44</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="45" name="seat[]" class="custom-control-input" id="customCheck45">
                                                            <label class="custom-control-label" for="customCheck45">45</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="46" name="seat[]" class="custom-control-input" id="customCheck46">
                                                            <label class="custom-control-label" for="customCheck46">46</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="47" name="seat[]" class="custom-control-input" id="customCheck47">
                                                            <label class="custom-control-label" for="customCheck47">47</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="48" name="seat[]" class="custom-control-input" id="customCheck48">
                                                            <label class="custom-control-label" for="customCheck48">48</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="49" name="seat[]" class="custom-control-input" id="customCheck49">
                                                            <label class="custom-control-label" for="customCheck49">49</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="50" name="seat[]" class="custom-control-input" id="customCheck50">
                                                            <label class="custom-control-label" for="customCheck50">50</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="51" name="seat[]" class="custom-control-input" id="customCheck51">
                                                            <label class="custom-control-label" for="customCheck51">51</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="52" name="seat[]" class="custom-control-input" id="customCheck52">
                                                            <label class="custom-control-label" for="customCheck52">52</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="53" name="seat[]" class="custom-control-input" id="customCheck53">
                                                            <label class="custom-control-label" for="customCheck53">53</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="54" name="seat[]" class="custom-control-input" id="customCheck54">
                                                            <label class="custom-control-label" for="customCheck54">54</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="55" name="seat[]" class="custom-control-input" id="customCheck55">
                                                            <label class="custom-control-label" for="customCheck55">55</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="56" name="seat[]" class="custom-control-input" id="customCheck56">
                                                            <label class="custom-control-label" for="customCheck56">56</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="57" name="seat[]" class="custom-control-input" id="customCheck57">
                                                            <label class="custom-control-label" for="customCheck57">57</label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="58" name="seat[]" class="custom-control-input" id="customCheck58">
                                                            <label class="custom-control-label" for="customCheck58">58</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="59" name="seat[]" class="custom-control-input" id="customCheck59">
                                                            <label class="custom-control-label" for="customCheck59">59</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="60" name="seat[]" class="custom-control-input" id="customCheck60">
                                                            <label class="custom-control-label" for="customCheck60">60</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <center>
                                            <button class="mt-3 mb-4 mx-auto text-center btn btn-primary" name="submit">Submit</button>
                                        </center>
                                    </form>

                                    <!-- Booking Confromation modal -->


                                    <?php

                                    if (isset($_POST['submit'])) { //to run PHP script on submit
                                        if (!empty($_POST['seat']) && !empty($_POST['from']) && !empty($_POST['to'])) {
                                            $from = $_POST['from'];
                                            $to = $_POST['to'];
                                            $seat = $_POST['seat'];
                                            $date = $_POST['date'];

                                            $_SESSION['seatcount'] = $seat;
                                            $_SESSION['arridate'] = $date;
                                            $_SESSION['fromadd'] = $from;
                                            $_SESSION['toadd'] = $to;
                                            // Loop to store and display values of individual checked checkbox.

                                            foreach ($_POST['seat'] as $selected) {
                                                $string .= $selected . ',';
                                            }
                                    ?>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td>From</td>
                                                        <td>To</td>
                                                        <td>Selected Seats</td>
                                                        <td>Arrival Date</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $from ?></td>
                                                        <td><?php echo $to ?></td>
                                                        <td><?php echo $string ?></td>
                                                        <td><?php echo $date ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12 mt-3 form-group" style="margin-bottom: -30px;">
                                                    <form method="POST">
                                                        <center>
                                                            <button type="submit" name="confirm" class="btn btn-primary rounded-0 py-2 px-4">Book Now</button>
                                                            <span class="submitting"></span>
                                                        </center>
                                                    </form>
                                                </div>
                                            </div>
                                    <?php

                                        }
                                    }

                                    ?>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })

        $('#myModal2').on('shown.bs.modal', function() {
            $('#myInput2').trigger('focus')
        })
    </script>

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
</body>

</html>