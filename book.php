<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Travel and Guidance</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/package.css">
    
    <script>
       $(document).ready(function(){
           $(".scroll-top").click(function() {
               $("html, body").animate({ 
                  scrollTop: 0 
             }, "slow");
               return false;
        });
       });
   </script>

</head>

<body>
    <?php
    include("header.php");
    include("login.php");
    include("register.php");
    ?>
    <div class="heading" style="background: url(images/tt.jpg) no-repeat">
        <h1>Book Now</h1>
    </div>
    <section class="booking">
        <h1 class="heading-title">Book Your Trip!</h1>
        <form action="book_form.php" method="post" class="book-form">

            <div class="flex">
                <div class="inputBox">
                    <span>Name:</span>
                    <input type="text" placeholder="Enter your name" name="name" required="required">
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="Enter your email" name="email" required="required">
                </div>
                <div class="inputBox">
                    <span>Phone:</span>
                    <input type="number" placeholder="Enter your phone number" name="phone" required="required">
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="Enter your address" name="address" required="required">
                </div>
                <div class="inputBox">
                    <span>Location:</span>
                    <input type="text" placeholder="Place you want to visit" name="location" required="required">
                </div>
                <div class="inputBox">
                    <span>Guests:</span>
                    <input type="number" placeholder="Number of guests" name="guests" required="required">
                </div>
                <div class="inputBox">
                    <span>Arrivals:</span>
                    <input type="date" name="arrivals" required="required">
                </div>
                <div class="inputBox">
                    <span>Leaving:</span>
                    <input type="date" name="leaving" required="required">
                </div>
                <!-- <div class="inputBox">
                    <span>Booking Status:</span>
                    <select name="booking_status" required="required">
                        <option value="">Select Booking Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Confirmed">Confirmed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div> -->
                
            </div>

            <input type="submit" value="Submit" class="btn" name="send">

        </form>
    </section>
    <button type="button" class="scroll-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>
    <?php
    include 'footer.php';
    ?>
</body>

</html>