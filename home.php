<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency Best Agency</title>
   
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/home.css">
   <link rel="stylesheet" href="css/footer.css">
   <link rel="stylesheet" href="css/package.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
     <link rel="stylesheet" href="css/style.css">
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
  <!-- hhome section starts -->
<section class="home">
  
<div class="swiper-slide slide" style="background:url(images/Blue_Nile.png) no-repeat"></div>
 

</section>
 

<!-- begining of services section -->
<section class="services">
    <h1 class="services-title">our services</h1>
    <div class="box-container">
        <div class="box">
        <img src="images/icon-2.png" alt="tour guide icon">
         <h3>tour guide</h3>
        </div>
        
        <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>camping</h3>
      </div>

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>adventure</h3>
          </div>
           
         <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>trekking</h3>
         </div>
         <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>off road</h3>
          </div>

         <div class="box">
         <img src="images/icon-4.png" alt="camping icon">
         <h3>camp fire</h3>
         </div>
    </div>
    </section>
 <!-- home services section ends  -->

 <!-- home about section starts  -->
<section class="home-about">
   <div class="image">
      <img src="images/wonchi.jpg" alt="iage">
   </div>
   <div class="home-about-us-content">
      <h2>about us</h2>
      <p>Amazing Tours a Best tour Operator and Travel agent in Ethiopia. We have Tour Package, Hotel booking. Ethiopia Tours & Travel agent. domestic tour packages from Ethiopia at low prices including best ... Travel Package | FAMILY Package | Tour Package</p>
      <a href="about.php" class="btn">read more</a>
   </div>
</section>
<!-- home about section ends -->
<!-- home pakcages -->
<section class="home-packages">
   <h1 class="heading-title"> our packages </h1>
   <div class="box-container">
      <div class="box">
         <div class="image">
            <img src="images/simen.jpg" alt="">
         </div>
         <div class="content">
            <h3>semien mountains Tour Packages</h3>
            <p>Enjoy the ETHIOPIAN with unforgettable fun with our ETHIOPIA top selling packages!</p>
            <h2>$50</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <img src="images/gorgora.jpg" alt="gorgora">
         </div>
         <div class="content">
            <h3>gorgora Tour Packages</h3>
            <p>Enjoy the ETHIOPIA with unforgettable fun with our gorgora top selling packages!</p>
            <h2>$50</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <img src="images/walia.jpg" alt="">
         </div>
         <div class="content">
            <h3>semien mountain Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our semien mountain top selling packages!</p>
            <h2>$50</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>
   </div>
   <div class="load-more"> <a href="package.php" class="btn">load more</a> </div>
</section>
<!-- home offer section starts  -->
<section class="home-offer home-packages">
   <div class="content">
      <div class="offerimage">
      <img src="images/wonchi.jpg">
      </div>
   </div>
   <div class="content">
      <h3>upto 40% off</h3>
      <p>wonchi Resort is centrally located within walking distance to the nightlife and excitement of the Kuta area. This popular Bali accommodation offers a wide range of room types to suit families and couples. The kids can enjoy the kids club while the adults spoil themselves at Ashoka Spa or the Beach Club. For a memorable and relaxing stay in Kuta why not stay at Bali Dynasty Resort.</p>
      <a href="book.php" class="btn">book now</a>
   </div>
</section>
<!-- home offer section ends -->
<button type="button" class="scroll-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>
    
<?php
include("footer.php");
?>
<script src="js/script.js"></script>
</body>
</html>
