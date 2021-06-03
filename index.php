<?php
include('functions.php');
require_once 'Php/createUserTable.php';
$db=new CreateUserTb("shadowdb","users");

require_once 'Php/createProductTable.php';
$db=new CreateProductTb("shadowdb","products");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet"/>
<title>SHADOW</title>
<link rel="icon" href="image/logo.png">



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


<!--slider-->
<div class="slide-container">
<input type="radio" name="imgs" id="i1" checked>
<input type="radio" name="imgs" id="i2">
<input type="radio" name="imgs" id="i3">

<div class="slide" id="one">
<img src="image/homeslider1.jpg">
<div class="ani">
<p>New Stussy T-Shirt</p>
<a href="shop.php" class="slider-button">SHOP STUSSY HERE</a>
</div>
<label for="i3" class="pre"></label>
<label for="i2" class="nxt"></label>
</div>
<div class="slide" id="two">
<img src="image/homeslider2.jpg">
<div class="ani1">
<p>New Champion collection</p>
<a href="shop.php" class="slider-button">SHOP CHAMPION HERE</a>
</div>
<label for="i1" class="pre"></label>
<label for="i3" class="nxt"></label>
</div>
<div class="slide" id="three">
<img src="image/homeslider3.jpg">
<div class="ani2">
<a href="shop.php" class="slider-button">SHOP SSUR HERE</a>
</div>
<label for="i2" class="pre"></label>
<label for="i1" class="nxt"></label>
</div>

<div class="nav-slider">
<label class="dots" id="dot1" for="i1"></label>
<label class="dots" id="dot2" for="i2"></label>
<label class="dots" id="dot3" for="i3"></label>
</div>
</div>

<!--Brands-->
<h1 class="title">Brands</h1>
<div class="wcwd">
    <ul>
        <li>
            <a href="shop.php"> <div class="content">
            <h2>STUSSY</h2>
            <p>Stussy is a clothing brand that was founded in 1984, by Shawn Stussy. Stussy is known for its iconic signature like print on apparel and accessories, as well as being one of the oldest and original streetwear brands.
            </p> </div></a>
        </li>
        <li>
            <a href="shop.php"><div class="content">
            <h2>Champion</h2>
            <p>Champion U.S.A. is an American clothing manufacturer, specializing in sportswear founded as Champion Athleticwear by Simon Feinbloom and his sons Abraham and William in Rochestor.
            </p></div></a>
        </li>
        <li>
            <a href="shop.php"><div class="content" >
            <h2 >COMME des GARCONS</h2>
            <p>COMME des GARCONS, meaning "like boys" in French, is a Japanese fashion label founded by Rei Kawakubo. Renowned for its avant garde aesthetic and unconventional silhouettes, Kawakubo transformed the brand into a successful fashion label.</p>
            </p></div></a>
        </li>
        <li>
            <a href="shop.php"><div class="content">
            <h2>SSUR</h2>
            <p>SSUR is a streetwear clothing label, founded by Ruslan Karablin. The branding name is derived from the backwards spelling of "RUSS", which reflects Karablin's Russian heritage.
            </p></div></a>    
        </li>
        <li>
       <a href="shop.php"><div class="content">
            <h2>SHADOW</h2>
            <p>Shadow is a street wear clothing company and also a street wear retailer; It is founded by Chen Pong in the year of 2017 to promote Malaysia and other countries' subculture through streetwear. </p>
        </div></a>
        </li>
        </ul>
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