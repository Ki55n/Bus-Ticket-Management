<?php

session_start();

include 'config.php';

$name = $_SESSION['username'];
$email = $_SESSION['emailaddress'];

if (isset($_POST['updateticket'])) { //to run PHP script on submit
    if (!empty($_POST['newfrom']) && !empty($_POST['newto']) && !empty($_POST['arrival']) && !empty($_POST['newseat'])) {
        $newfrom = $_POST['newfrom'];
        $newto = $_POST['newto'];
        $arrival = $_POST['arrival'];
        $newseat = $_POST['newseat'];
        $id = $_SESSION['bookingidnew'];

        $sql = "UPDATE `tickets` SET `From` = '$newfrom', `To` = '$newto', `Arrival_Date` = '$arrival', `Seat_Number` = '$newseat' WHERE `Email` = '$email' AND `Booking_ID` = '$id'";
        $resultsql = mysqli_query($link, $sql);
        if ($resultsql) {
            echo "<script>alert('Ticket Updated Successful')</script>";
        } else {
            echo "<script>alert('Something went Wrong')</script>";
        }
    }
}

if (isset($_POST['delete'])) { //to run PHP script on submit

    $id = $_SESSION['bookingidnew'];

    $sql = "DELETE FROM tickets WHERE Email ='$email' AND Booking_ID = '$id'";
    $resultsql = mysqli_query($link, $sql);
    if ($resultsql) {
        echo "<script>alert('Ticket Deleted Successful')</script>";
    } else {
        echo "<script>alert('Something went Wrong')</script>";
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
</head>

<body>
    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <h1>BTBS<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="history.php" class="active">Recent Booking</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>

    <div class="content">

        <div class="container col-11" style="margin-bottom: -50px;">
            <h3 class="text-center mb-5 font-weight-bold" style="margin-top: -50px;">Hello, Welcome <?php echo $name ?>
            </h3>
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-12">
                    <div class="form h-100">
                        <h3>List of Bookings</h3>
                        <form class="" method="post" id="contactForm" name="contactForm">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Slno</th>
                                            <th>Booking ID</th>
                                            <th>From Place</th>
                                            <th>To Place</th>
                                            <th>Seats</th>
                                            <th>Arrival Date</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    $sql = "SELECT * FROM tickets WHERE Email = '$email'";
                                    $result = mysqli_query($link, $sql);
                                    while ($record = mysqli_fetch_assoc($result)) {

                                        $bbid = $record['Booking_ID'];
                                        $timeto = $record['created_at'];

                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $record['id'] ?></td>
                                                <td><?php echo $record['Booking_ID'] ?></td>
                                                <td><?php echo $record['From'] ?></td>
                                                <td><?php echo $record['To'] ?></td>
                                                <td><?php echo $record['Seat_Number'] ?></td>
                                                <td>
                                                    <?php echo $record['Arrival_Date'] ?></td>
                                                <td><?php echo $record['created_at'] ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row align-items-stretch no-gutters contact-wrap mt-5">
                <div class="col-12">
                    <div class="form h-100">
                        <h3>Modify Bookings</h3>
                        <form class="" method="post" id="contactForm" name="contactForm">
                            <div class="form-group mb-3">
                                <label for="" class="col-form-label">Enter Your Booking ID to Modify *</label>
                                <input type="text" class="form-control" name="bookingid" id="email" required placeholder="Your Booking ID">
                            </div><br>
                            <center>
                                <button type="submit" name="submit" class="btn btn-primary rounded-0 py-2 px-4">Submit</button>
                                <span class="submitting"></span>
                            </center>
                        </form>
                        <?php

                        if (isset($_POST['submit'])) { //to run PHP script on submit
                            if (!empty($_POST['bookingid'])) {
                                $id = $_POST['bookingid'];
                                $_SESSION['bookingidnew'] = $id;

                                $sql = "SELECT * FROM tickets WHERE Email = '$email' AND Booking_ID = '$id'";
                                $resultsql = mysqli_query($link, $sql);
                                if ($resultsql->num_rows > 0) {
                                    $recordsql = mysqli_fetch_assoc($resultsql);

                        ?>
                                    <form method="POST">
                                        <div class="mt-4 mb-5">
                                            <div class="row">
                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="" class="col-form-label">From Place *</label>
                                                    <input type="text" class="form-control" name="newfrom" id="name" required placeholder="<?php echo $recordsql['From'] ?>">
                                                </div>
                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="" class="col-form-label">To Place *</label>
                                                    <input type="text" class="form-control" name="newto" id="email" required placeholder="<?php echo $recordsql['To'] ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="" class="col-form-label">Arrival Date *</label>
                                                    <input type="date" class="form-control" name="arrival" id="name" required placeholder="<?php echo $recordsql['Arrival_Date'] ?>">
                                                </div>
                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="" class="col-form-label">Seat *</label>
                                                    <input type="text" class="form-control" name="newseat" id="email" required placeholder="<?php echo $recordsql['Seat_Number'] ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mt-4 form-group" style="margin-bottom: -20px;">
                                                    <center>
                                                        <button type="submit" name="updateticket" class="btn btn-success rounded-0 py-2 px-4">Update</button>
                                                        <span class="submitting"></span>
                                                        <hr>
                                    </form>
                                    <form method="POST">
                                        <button type="submit" name="delete" class="btn btn-danger rounded-0 py-2 px-4">Delete
                                            Ticket</button>
                                        <span class="submitting"></span>
                                    </form>
                                    </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
                                } else {
                                    echo "<script>alert('No Data Found')</script>";
                                }
                            }
                        }

?>
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