<?php

include("auth_session.php");
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/nikhiil.css">

</head>
<body>

<section class="navbar">
<div class="container">
    <div class="logo">
    <img src="image/22a7ca8265de405aba8a65d77c32b5cd.png" alt="restaurent logo" class="img-responsive">
    </div>
    <div class="title-heading">
            <p class="heading">CUTM FOODS</p>
</div>


   <div class="Menu text-right">
<ul>
    <li>
        <a href="#">Home</a>
    </li>
    <li>
        <a href="categories.php">categories</a>
    </li>
    <li>
        <a href="menu.php">menu</a>
    </li>
    <li>
        <a href="logout.php">logout</a>
    </li>
</ul>
</div>
<div class="clearfix">

</div>
</div>

</section>

<section class="food-search text-center">
        <div class="container">
        <p class="borderimg1">
            
            <form action="../food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required >
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
</p>
        </div>
 
        
    </section>

    <section>
   
        <div class="container">
        <p class="borderimg1">
    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../images/burger1.jpg" style="width:100%">
  <div class="textt">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../images/ppp.jpg" style="width:100%">
  <div class="textt">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../images/lollipop.jpg" style="width:100%">
  <div class="textt">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</p>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); 
}
</script>

</div>

</section>

    <?php 
        
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }

        ?>


<section class="social">
    <div class="container text-center">
    <ul>
        <li>
            <a href="a"><img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png"/></a>
        </li>
        <li>
            <a href="a"><img src="https://img.icons8.com/color/48/000000/instagram-new--v1.png"/></a>
        </li>
        <li>
            <a href="a"><img src="https://img.icons8.com/color/48/000000/gmail--v1.png"/></a>
        </li>
    </ul>
    </div>
</section>
<section class="footer">
    <div class="container text-center">
<p>All rights reserved. Designed By <a href="a">@Rehan Syed</a></p>
</div>
</section>
</body>
</html>