<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

  
    <link rel="stylesheet" href="css/rehann.css">
</head>

<body>
 
  
    <section class="navbar">

        <div class="container">
          <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/22a7ca8265de405aba8a65d77c32b5cd.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>


            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="">about</a>
                    </li>
                    <li>
                        <a href="demo/registration.php">signup</a>
                    </li>
                    <li>
                        <a href="demo/login.php">login</a>
                    </li>
                </ul>
            </div>


            <div class="clearfix"></div>
        </div>
    </section>


    <section class="food-search text-center ">
 
        <div class="container">
 <div class="title-heading">
 <p class="borderimg1 heading">
         <b> **CUTM FOODS**</b>
          <div class="scroll-container">
  <div class="scroll-text">“Food brings people together on many different levels. It is nourishment of the soul and body; it is truly love.”<div>
</div>
</p>
        </div>
    

    </section>
   
   
    <?php 
        
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }

        ?>

  
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>

            <a href="demo/login.php">
            <div class="box-3 float-container">
                <img src="images/bf1.jpg" alt="Breakfast" class="img-responsive img-curve image" >
                <div class="overlay">
                <h3 class="float-text text-white text">BreakFast</h3>
            </div>
            </div>
            </a>

            <a href="demo/login.php">
            <div class="box-3 float-container">
                <img src="images/lunch1.jpg" alt="Lunch" class="img-responsive img-curve image">
                <div class="overlay">
                <h3 class="float-text text-white text">Lunch</h3>
            </div>
            </div>
            </a>

            <a href="demo/login.php">
            <div class="box-3 float-container">
                <img src="images/momo.jpg" alt="Dinner" class="img-responsive img-curve image">
                <div class="overlay">
                <h3 class="float-text text-white text">Dinner</h3>
            </div>
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>
  
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png"/></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/rehan__._._/?igshid=YmMyMTA2M2Y%3D"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/color/48/000000/gmail--v1.png"/></a>
                </li>
            </ul>
        </div>
    </section>

    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">@Rehan syed</a></p>
        </div>
    </section>
   

</body>
</html>