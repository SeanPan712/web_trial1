<?php
require("functions.php");
require_once("Php/dbcontroller1.php");

$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>
<html>
<head>
<title>Shopping Cart</title>
<link rel="icon" href="image/logo.png">
<link href="style.css" type="text/css" rel="stylesheet"/>


</head>
<!--header & navbar-->
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
<div id="shopping-cart">




<div class="title-text">My Shopping Cart</div>

<div class="btnEmpty">
<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
</div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table>
<tbody>

<?php 
foreach ($_SESSION["cart_item"] as $item){
    $individual_total=($item["price"]*$item["quantity"]);
    ?>
    <tr class="content">
    <td><img class="product-image-size"src='<?php echo $item["image"]; ?>'></td>
   
    <td><h5><?php echo $item ["brand"]?></h5><br><p><?php echo $item["name"];?>
    <br> <?php echo $item["code"];?></p></td>
   
    <td align=center><b>Quantity:</b><br><?php echo $item["quantity"];?></td>
   
    <td align=center><b>Unit Price:</b><br><?php echo "RM" .$item["price"];?></td>
    
        <td align=center><b>Total Price:</b><br><?php echo "RM" .$individual_total;?></td>
    
   
    <td align=center><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" 
    class="btnRemoveAction"><button class="removelink">Remove Item</button></a></td>
</tr>
	

<?php 
        
    
$item_total += ($item["price"]*$item["quantity"]);
}
?>

<tr class="total">
<td colspan="4" align=right><h5 style="font-size: 24px;">Total:</h5></td>
<td align=left><h5 style="font-size: 18px;"><?php echo "RM " .$item_total;?></h5></td>
<td align=center><a href="checkedOut.php"><button class="checkout">Check Out</button></a></td>

</tr>
</tbody>
</table>

<?php
}
?>
</div>

</body>

<!--Footer-->
<footer style="margin-top:70px">
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