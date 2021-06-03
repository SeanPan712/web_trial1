<?php
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="icon" href="image/logo.png">
    <link href="style.css" type="text/css" rel="stylesheet"/> 

</head>
<!-- Header & Nav -->

<header>
<a href="index.php"><img src="image/logo2.png" alt="logo" class="logo"></a>

<nav>
<a href="index.php">HOME</a>
<a href="shop.php">SHOP</a>

 <?php  if (isset($_SESSION['user'])){  ?>
                <strong style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:28px">
                <?php echo $_SESSION['user']['lastname']; ?></strong>
                <small>
                     <i style="color: #888; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;">
                     (<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                </small>
            <a href="index.php?logout='1'" >Logout</a>
            <?php
            }
            else
            {
            echo '<a href="login.php">LOG IN</a><a href="register.php">REGISTER</a>
                  ';
            }
            ?>
<a href="cart.php"><img width="30px" height="25px" src="image/cart.png"><?php
                        if (isset($_SESSION['cart_item'])){
                            $count = count($_SESSION['cart_item']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        } else {
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }
                    ?></a>

</nav>


</header>
<body>
    
    <h2 class="register-header">Login</h2>
  
    <form class="login" method="post" action="login.php">
        <div class="input-group">
            <label>Email:</label>
            <br>
            <input type="email" name="email" placeholder="Email">
            <span class="error">*</span>
        </div>
        <br>
        <div class="input-group">
            <label>Password:</label>
            <br>
            <input type="password" name="password" placeholder="Password">
            <span class="error">*</span>
        </div>
        <br>
        <div class="input-group">
            <button type="submit" class="btn" name="login_btn">LOGIN</button>
        </div>
        <br>
        <?php echo display_error(); ?>
        <div class="loginchoice">
            <p>New to Shadow? Click <a href="register.php" style="color: #d33737;">Here </a>to Register.</p>
        </div>
        <br>
    </form>
    <hr style="opacity: 0.2; margin-top: 2.25rem;">
</body>

<!--Footer-->
<footer>
    <div class="footer-left">
    <a href="index.php"><img src="image/logo2.png" alt="logo" class="footer-logo"></a>
    <p>Shadow Sdn. Bhd. is a street wear clothing company
        and also a street wear retailer; It is founded by Pan
        Chen Pong in the year of 2017. Our core values are
        promoting Malaysia and other countries' subculture
        through streetwear.  </p>
        <img class="payment" src="image/payment.png">
        <div class="copyright">
            &copy; SHADOW 2020
        </div>
</div>
    <div class="footer-mid">
    <p class="footer-subheader">ABOUT</p><br>
    <a href="aboutUs.php">About Us</a><br>
    <a href="contactUs.php">Contact Us</a><br>

   
</div>
    <div class="footer-right">
        <p class="footer-subheader">CUSTOMER SERVICE</p><br>
        <a href="shipping.php">Shipping Information</a><br>
        <div class="socialmedia">
            <p>Follow us on all our social media!</p>
        <a href="https://www.facebook.com/"><img class="face" src="image/fb.png"></a>
        <a href="https://www.twitter.com/"><img class="twt" src="image/twitter.png"></a>
        <a href="https://www.instagram.com/"><img class="insta" src="image/insta.png"></a>
        <a href="https://www.youtube.com/"><img class="youtube" src="image/youtube.png"></a>
    
        </div>
        
        

    </div>
</footer>
</html>