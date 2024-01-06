<?php

include("dbconn.php");
?>

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
                        <a href="demo/dashboard.php">Home</a>
                    </li>
                    <li>
                        <a href="demo/categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="demo/registration.php">SignUp</a>
                    </li>
                    <li>
                        <a href="demo/login.php">Login</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>


  
    <section class="food-search text-center">
        <div class="container">
            <?php 

               
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Foods on Your Search <a href="#" class="text-black">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
 



  
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 

              
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                
                $count = mysqli_num_rows($res);

             
                if($count>0)
                {
                   
                    while($row=mysqli_fetch_assoc($res))
                    {
                        
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    
                                    if($image_name=="")
                                    {
                                       
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">Rs<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    
                    echo "<div class='error'>Food not found.</div>";
                }
            
            ?>

            

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
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
 
</body>
</html>
