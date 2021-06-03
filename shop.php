<?php
include("functions.php");
require_once("Php/dbcontroller1.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"]=>array(
                    'name'=>$productByCode[0]["name"], 
                    'code'=>$productByCode[0]["code"], 
                    'image'=>$productByCode[0]["image"],
                    'brand'=>$productByCode[0]["brand"],
                    'quantity'=>$_POST["quantity"],
                    'price'=>$productByCode[0]["price"]));
                
                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k)
                                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
       
    }
}
?>
<html>
<head>
<title>SHADOW - Shop</title>
<link rel="icon" href="image/logo.png">

<style> 


html,body {
  margin:  0;
  padding: 0;
  height: 100%;
  width : 100%;
  background:white; 
}

/*header*/
header {
    background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 4px solid #d33737;
  }

header a{
    color: #000000;
    margin-left: 10px;
    background-color: #FFFFFF;
    overflow: hidden;
    align-items: center;
    justify-content: center;
    padding: 10px 10px 10px 0;

}

header a:hover{
  color: #d33737;
}



nav a{
    color: #000000;
    font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
    font-style: 'Open Sans';
    font-size: 24px;
    font-weight: bold;
    text-transform: capitalize;
    text-decoration: none;


}
  .logo {
    height: 50px;
    display: block;
  }
  

  .cart {
    margin-left: 0rem;
    margin-right: 0rem;
  }
  .cart a {
    color: #000000;
  }
  .login-register {
    margin-right: 0rem;
  }
  
  .login-register a {
    text-decoration: none;
    color: #000000;
  font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
  }
 .navbar a:hover {
    background-color: white;
    color: blue;
  }
  /*title*/
  .title-text {
  color: #000000;
  font-size: 80px;
  margin-left:45px;
  text-transform: capitalize;
  font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
  text-decoration:underline;
  text-decoration-color:#d33737;
}

/*product display*/
.product-item {	
	float:left;	
	background:#000;	
	width: 250px;
	height: 300px;
	margin-left:45px;
	margin-bottom:40px;
	font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
	padding:5px;
}
	
.product-item div{
	text-align:center; 
	color: #fff;
	margin: 1px 5px 1px 5px;
}
.product-image {
	height:180px; 
	background-color:#FFF;
}
.product-image-size {
	height:auto; 
	width:auto; 
	max-width:180px; 
	max-height: 180px;
}
.textinput{
border: 4px solid #F90404;
font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
text-align:center;

}
.button{
background-color:#F9963F;
border: 4px solid #F9963F;
font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
margin-left: 4px;
}
/*footer*/
footer{
  background-color:#FFFFFF;
  height: 250px;
  border-top: 2px solid black;
  color: #000000;
  display:flex;
  width:100%;
}

.footer-logo{
  margin-bottom:0px;
  height:80px;
  display: flex;
}

.footer-left {
font-size: 12px;
width: 50%;

}

.footer-left p{
  padding-left: 15px;
  text-align: justify;
  font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
  font-size: 14px;
  font-weight: normal;
}

.footer-mid{
width: 20%;
padding-left: 50px;
text-align: left;
}

footer a{
  text-decoration: none;
  color: #000000;
  font-size: 18px;
  font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
}

footer a:hover{
  color: #d33737;
}
.footer-subheader{
  font-size: 24px;
  color: #d33737;
  font-weight: bold;
  margin-bottom: 7px;
  font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
}

.footer-right{
width: 20%;
padding-left: 0px;
text-align: left;
}

.payment{
  padding-left: 15px;
}

.socialmedia{
  font-size: 14px;
  margin-top: 80px;
  text-align: left;
  font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
}

.face {
  padding: 0px;
  width: 30px;
  text-decoration: none;
}
.face:hover {
  opacity: 0.5;
}

.twt {
  padding: 0px;
  width: 30px;
  text-decoration: none;
}
.twt:hover {
  opacity: 0.5;
}
.insta {
  padding: 0px;
  width: 30px;
  text-decoration: none;
}
.insta:hover {
  opacity: 0.5;
}
.youtube {
  padding: 0px;
  width: 30px;
  text-decoration: none;
}
.youtube:hover {
  opacity: 0.5;
}

.copyright{
  margin-top: 44px;
   color: #575251;
    text-align: left;
    padding-left: 10px;
    font-size: 12px;
  font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
  }




</style>
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

	<div class="title-text">SHOP</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY brand ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="shop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img class="product-image-size" src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div style="text-decoration:underline; font-size: 20px; "><strong><?php echo $product_array[$key]["brand"]; ?></strong></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "RM ".$product_array[$key]["price"]; ?></div>
			<div><input class="textinput" type="text" pattern="[/1-9/]{1}" 
			title="You can only buy a minimum of 1 item and a maximum of 9 items. Only Number is allowed!" 
			name="quantity" value="1" size="2" /><input class="button" type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
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