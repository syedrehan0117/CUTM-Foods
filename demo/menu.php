<?php

include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>


    <link rel="stylesheet" href="../css/nikhiil.css">
</head>

<body>
    
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="../images/22a7ca8265de405aba8a65d77c32b5cd.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="menu.php">menu</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

<html>
    <head>
        <title>menu</title>
        <link rel="stylesheet" href="sstyle.css">
</head>
<body>
<section class="food-search text-center">
        <div class="container">
            
            <form action="../food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required >
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
               
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

               
                $res=mysqli_query($conn, $sql);

                
                $count = mysqli_num_rows($res);

                
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                       
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
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
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
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
