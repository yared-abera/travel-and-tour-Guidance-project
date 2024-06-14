<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
   include("header.php");
   include("dbconnect.php");

   //$conn =mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $location = $_POST['location'];
      $guests = $_POST['guests'];
      $arrivals = $_POST['arrivals'];
      $leaving = $_POST['leaving'];
      
    $request = " insert into bookings (name, email, phone, address, location, guests, arrivals, leaving) values('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving') ";
    mysqli_query($conn, $request);
    session_start();
    $_SESSION['success_message'] = "booked successfully.";
    header('location:book.php');

} else {
    echo 'something went wrong please try again!';
}

?>

</body>
</html>