<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
 
// Check if the user is logged in
if (isset($_SESSION['username'])) { 
    header("Location: userhome.php");
}
  
   include("above_header.php"); 
   include("header.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>
   

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/about.css">
   <link rel="stylesheet" href="css/package.css">
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
   ?>
   <div class="heading" style="background:url(images/souf-omer.jpg)  no-repeat">
      <h1>ABOUT US</h1>       
</div>
   <section class="about">

   <div class="image">
      <img src="images/simen.jpg" alt="">
   </div>

   <div class="content">
      <h3>why choose us?</h3>
      <p>Amazing Tours a Best tour Operator and Travel agent in Ethiopia. We are Tour Package, Hotel booking. Ethiopia Tours & Travel agent. Find international and domestic tour packages from bangladesh at low prices including best ... Travel Package | Honeymoon Package | Tour Package
      Fantastic getaway. Very good communication. Friendly and Easy to deal with.</p>
      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span>top destinations</span>
         </div>
         <div class="icons">
            <i class="fas fa-headset"></i>
            <span>24/7 guide service</span>
         </div>
         <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span>reasonable price</span>
         </div>
      </div>
   </div>

</section>

<section class="reviews">

   <h1 class="heading-title"> Tour Guiders </h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>Aziz Ahmed is the best tour guider in our company best known in ethiopia wild life.</p>
            <h3>Aziz Ahmed</h3>
            <span>Tour guider</span>
            <img src="images/aziz ahmed.jfif" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>Abebe Teka is one of tout guider in our company well experienced in northern part of ethiopia.</p>
            <h3>Abebe Teka</h3>
            <span>Tour guider</span>
            <img src="images/abebe.jfif" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>kebrom is well experienced tour guider in this agency.</p>
            <h3>Kebrom seifu</h3>
            <span>tour guider</span>
            <img src="images/kebrom.jfif" alt="">
         </div>
      </div>
      </div>
      </section>

<script src="js/script.js"></script>
<?php
include "footer.php";
?>
</body>
</html>