<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="bosst.css">
    <link rel="stylesheet" href="raheem.css">
</head>
<body>
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
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="">about</a>
                    </li>
                    <li>
                        <a href="registration.php">signup</a>
                    </li>
                    <li>
                        <a href="login.php">login</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
<?php
    require('db.php');
   
 
    if (isset($_REQUEST['username'])) {
       
        $username = stripslashes($_REQUEST['username']);
   
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, email, password, trn_date)
                     VALUES ('$username','$email', '" . md5($password) . "',  '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
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