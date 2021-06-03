<?php
include('functions.php');
require('Php/createContactTB.php');
$db=new CreateContactTb("shadowdb","contactUs");

?>
<html>
<head>
<title>SHADOW - Contact Us</title>
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
                <strong style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:28px"><?php echo $_SESSION['user']['lastname']; ?></strong>
                <small>
                     <i style="color: #888; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
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



<div>
 <!--Register-->

    <form class="contact" method="post" action="contactUs.php">
    <h2 class="contactTitle">Contact Us</h2>

            <label>Name: </label>
            <br>
            <input type="text" name="name" placeholder="Name" value="">
            <span class="error">*</span>
        <br>
        <br>
            <label>Email: </label>
            <br>
            <input type="email" name="email" placeholder="Email" value="">
            <span class="error">*</span>
        <br>
        <br>
            <label>Inquiry/ Message: </label>
            <br>
            <input style="width:400px; height: 200px;"type="text" name="inquiry" value="">
        <br>
                <br>
        
        <div class="input-group">
            <button type="submit" class="btn" name="contactUs">SEND</button>
        </div>
        <br>
        <?php echo display_error(); ?>
      
    </form>

<div class="storecontainer">
<div class="information">
    <h5 style="margin-top:0px">Store Information</h5>
    <p style="margin-top:40px"><b>Store Name:</b> Shadow Co</p><br>
    <p style="margin-top:0px"><b>Address:</b> 12, Jln SS15/4D, SS15, 47500 Subang Jaya, Selangor, Malaysia.</p><br>
    <p style="margin-top:0px"><b>Opening Hours:</b> Tuesday to Sunday, 10 AM - 9 PM</p>
</div>
<div class="storeimage">
<img width=300px src="image/storefront.jpg"> 
</div>
</div>
</div>

<div class="map">
<h2 style="text-align: center; font-size:32px">Store Location</h2>
<iframe width="100%" height="600px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=3.078372184728,101.5866965386926+(Shadow)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
</div>
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

