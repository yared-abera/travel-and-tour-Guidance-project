<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/home.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    <!-- header section starts  -->
<section class="header">
   <a href="home.php" class="logo"><img src="images/logo.jpg"></a>
   <nav class="navbar">
      <a href="home.php" class="active">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
      <a href="book.php">book</a>
   </nav>
   <div id="humberger" class="fas fa-bars"></div>
</section>
    <!-- header section ends -->
<!-- home section starts  -->
<section class="home-section">
         <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg) no-repeat">
            </div> 

</section>
<!-- home section ends -->
<!-- begining of services section -->
<section class="services">
    <h1 class="services-title">our ervices</h1>
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
<section class="home-about-section">
   <div class="image">
      <img src="images/about-img.jpg" alt="iage">
   </div>
   <div class="home-about-us-content">
      <h2>about us</h2>
      <p>Amazing Tours a Best tour Operator and Travel agent in Bangladesh. We are Tour Package, Hotel booking. Bangladesh Tours & Travel agent. Find international and domestic tour packages from bangladesh at low prices including best ... Travel Package | Honeymoon Package | Tour Package</p>
      <a href="about.php" class="btn">read more</a>
   </div>
</section>
<!-- home about section ends -->
<!-- home pakcages -->
<section class="home-package">
<h1>packages</h1>
</section>
</body>
</html>
