<?php

include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    
    <link rel="stylesheet" href="../css/rehann.css">
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



    
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 

               
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes'";

                
                $res = mysqli_query($conn, $sql);

         
                $count = mysqli_num_rows($res);

             
                if($count>0)
                {
                    
                    while($row=mysqli_fetch_assoc($res))
                    {
                        
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve image">
                                        <?php
                                    }
                                ?>
                                 <div class="overlay">

                                <h3 class="text text-white"><?php echo $title; ?></h3>
                                </div>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                   
                    echo "<div class='error'>Category not found.</div>";
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