 <?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel and Guidance</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script>
        $(document).ready(function () {
            $(".scroll-top").click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                return false;
            });
        });
    </script> 
</head>

<body>

     <div class="heading" >  
          <a href="home.php" class="logo"> 
          
        <h1>Book Now</h1>
    </div>
    <section class="booking">

        <h1 class="heading-title">Book Your Trip!</h1>

        <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
            <div class="success-message">
                <?php echo $_SESSION['success_message']; ?>
            </div>
            <?php
            unset($_SESSION['success_message']);
        }
        ?>
        <form action="book_form.php" method="post" class="book-form">

            <div class="flex">
                <div class="inputBox">
                    <span>name :</span>
                    <input type="text" placeholder="enter your name" name="name" required="required">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="enter your email" name="email" required="required">
                </div>
                <div class="inputBox">
                    <span>phone :</span>
                    <input type="number" placeholder="enter your number" name="phone" required="required">
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="enter your address" name="address" required="required">
                </div>
                <div class="inputBox">
                    <span>where to :</span>
                    <input type="text" placeholder="place you want to visit" name="location" required="required">
                </div>
                <div class="inputBox">
                    <span>how many :</span>
                    <input type="number" placeholder="number of guests" name="guests" required="required">
                </div>
                <div class="inputBox">
                    <span>arrivals :</span>
                    <input type="date" name="arrivals" required="required">
                </div>
                <div class="inputBox">
                    <span>leaving :</span>
                    <input type="date" name="leaving" required="required">
                </div>
            </div>

            <input type="submit" value="submit" class="btn" name="send">

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