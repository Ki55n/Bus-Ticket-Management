SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `From` varchar(50) NOT NULL,
  `To` varchar(50) NOT NULL,
  `Seat_Number` varchar(255) NOT NULL,
  `Booking_ID` varchar(255) NOT NULL,
  `Arrival_Date` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

