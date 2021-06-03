<?php 
require('../functions.php');
//require ('../mysqli_connect.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN HOME</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="icon" href="../image/logo.png">


</head>
<body>
<header> 
<a href="#"><img src="../image/logo2.png" alt="logo" class="logo"></a>
           
         <nav>
                	
           <a href="home.php">Home</a>
           <a href="viewUser.php">View User</a>
           <a href="viewProduct.php">View Product</a>
          <?php  if (isset($_SESSION['user'])):  ?>
                <strong style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:26px"><?php echo $_SESSION['user']['lastname']; ?></strong>
                <small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<a href="home.php?logout='1'" >Logout</a>
                       &nbsp; 
					</small>
      
        </nav>
       
        <?php endif ?>
    </header>
           
			
<div>
<?php  if (isset($_SESSION['user'])) : ?>
					<div class="admintitle"><h2>Welcome, Admin <?php echo $_SESSION['user']['lastname']; ?>!<br></h2></div>


				<?php endif ?>
			</div>
 <div class="menu">
        <div class="container">
            <h1>User</h1>
            <a href="viewUser.php" class="adminhome">View Users</a><br><br>
            <a href="addUser.php" class="adminhome">Add User</a>
            
            
        </div>
        <div class="container"> 
        <h1>Product</h1>
            <a href="viewProduct.php" class="adminhome">View Products</a><br><br>
            <a href="addProduct.php" class="adminhome">Add Product</a>
        </div>
        
        </div>
<div class="user">
<div class="usercontainer">
<h1>Website View</h1>
<p>You can check out user's page in these link belows!</p>
<div class="usersubcontainer">
<a href="../index.php">Home</a>
<a href="../shop.php">Shop</a>
<a href="../cart.php">Cart</a>
<a href="../contactUs.php">Contact Us</a>
<a href="../aboutUs.php">About Us</a>

</div>

</div>
</div>
</body>
<!--Footer-->
<footer>
    <div class="footer-left">
    <a href="index.php"><img src="../image/logo2.png" alt="logo" class="footer-logo"></a>
    <p>Shadow Sdn. Bhd. is a street wear clothing company
        and also a street wear retailer; It is founded by Pan
        Chen Pong in the year of 2017. Our core values are
        promoting Malaysia and other countries’subculture
        through streetwear.  </p>
        <img class="payment" src="../image/payment.png">
        <div class="copyright">
            &copy; SHADOW 2020
        </div>
</div>
    <div class="footer-mid">
    <p class="../footer-subheader">ABOUT</p><br>
    <a href="../aboutUs.php">About Us</a><br>
    <a href="../contactUs.php">Contact Us</a><br>

   
</div>
    <div class="footer-right">
        <p class="footer-subheader">CUSTOMER SERVICE</p><br>
        <a href="../shipping.php">Shipping Information</a><br>
        <div class="socialmedia">
            <p>Follow us on all our social media!</p>
        <a href="https://www.facebook.com/"><img class="face" src="../image/fb.png"></a>
        <a href="https://www.twitter.com/"><img class="twt" src="../image/twitter.png"></a>
        <a href="https://www.instagram.com/"><img class="insta" src="../image/insta.png"></a>
        <a href="https://www.youtube.com/"><img class="youtube" src="../image/youtube.png"></a>
    
        </div>
        
        

    </div>
</footer>


			
</html>