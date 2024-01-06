<?php

include("dbconn.php");
?>

<html>
<head>
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
                        <a href="demo/menu.php">menu</a>
                    </li>
                    <li>
                        <a href="demo/logout.php">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <?php 
   
        if(isset($_GET['category_id']))
        {
            
            $category_id = $_GET['category_id'];
           
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

          
            $res = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($res);
           
            $category_title = $row['title'];
        }
        else
        {
           
            header('location:'.SITEURL);
        }
    ?>


   
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>




    
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
               
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";

              
                $res2 = mysqli_query($conn, $sql2);

              
                $count2 = mysqli_num_rows($res2);

               
                if($count2>0)
                {
                    
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
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
                    
                    echo "<div class='error'>Food not Available.</div>";
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
            <p>All rights reserved. Designed By <a href="#">RehanSyed</a></p>
        </div>
    </section>
  

</body>
</html>