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


            <div class="title-heading">
            <p class="heading">CUTM FOODS</p>
</div>



            <div class="menu text-right">
                <ul>
                <li>
        <a href="demo/dashboard.php">Home</a>
    </li>
    <li>
        <a href="demo/categories.php">categories</a>
    </li>
    <li>
        <a href="demo/menu.php">menu</a>
    </li>
    <li>
        <a href="demo/logout.php">logout</a>
    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>


    <?php 
       
        if(isset($_GET['food_id']))
        {
           
            $food_id = $_GET['food_id'];

            
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
           
            $res = mysqli_query($conn, $sql);
            
            $count = mysqli_num_rows($res);
           
            if($count==1)
            {
                
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                
                header('location:'.SITEURL);
            }
        }
        else
        {
          
            header('location:'.SITEURL);
        }
    ?>


    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-black">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

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
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">Rs<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Rehan Syed" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 94********" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. " class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
<br>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                
                if(isset($_POST['submit']))
                {
                    

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;  

                    $order_date = date("Y-m-d h:i:sa"); 

                    $status = "Ordered"; 

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    $sql2 = "INSERT INTO tbl_oder SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                  

                    
                    $res2 = mysqli_query($conn, $sql2);

                   
                    if($res2==true)
                    {
                       
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL.'demo/dashboard.php');
                    }
                    else
                    {
                        
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL.'demo/dashboard.php');
                    }

                }
            
            ?>

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
            <p>All rights reserved. Designed By <a href="#">Rehan syed</a></p>
        </div>
    </section>
   

</body>
</html>