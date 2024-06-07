<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>
   

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/about.css">
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
   <section class="header">

   <a href="home.php" class="logo"><img src="images/logo.jpg"></a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php" class="active">about</a>
      <a href="package.php">package</a>
      <a href="book.php">book</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>
   
   <div class="heading" style="background:url(images/blo.png)  no-repeat">
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



<script src="js/script.js"></script>
<?php
include "footer.php";
?>
</body>
</html>