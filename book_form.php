<?php

$connection = mysqli_connect('localhost', 'root', 'admin123', 'book_db');
if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $location = $_POST['location'];
      $guests = $_POST['guests'];
      $arrivals = $_POST['arrivals'];
      $leaving = $_POST['leaving'];
      
    $request = " insert into book_form(name, email, phone, address, location, guests, arrivals, leaving) values('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving') ";
    mysqli_query($connection, $request);
    session_start();
    $_SESSION['success_message'] = "room booked successfully.";
    header('location:book.php');

} else {
    echo 'something went wrong please try again!';
}

?>