<?php
require ('../functions.php');
//require ('../mysqli_connect.php');


if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['product']);
    header("location: ../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shadow - Add New Product</title>
    <link rel="icon" href="../image/logo.png">
    <link href="../style.css" type="text/css" rel="stylesheet"/> 
<style> 

h4{
color: black;
} 
.cancelContainer{
text-align: center;
padding-top: 5px;
}
.cancel{
    background-color:#EB5142 ;
    font-size: 18px;
    color: #fff;
    border: 2px solid #EB5142;
    border-radius: 4px;
    


}

.cancel:hover{
background-color:#000 ;
border: 2px solid #000;


}
</style>

</head>
<body>
    <!--header & navbar-->
<header> 
<a href="home.php"><img src="../image/logo2.png" alt="logo" class="logo"></a>
           
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
           
            <?php if (isset($_SESSION['success'])) : ?>
		<h4>
			<?php 
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			?>
		</h4>
<?php endif ?>
			
    <!--Register-->
    <h2 class="register-header">Add New Product</h2>

    <form class="register" method="post" action="addProduct.php">

        <div class="input-group">
            <label>Product Name: </label>
            <br>
            <input type="text" name="name" placeholder="Product Name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
            <span class="error">*</span>
        </div>
        <br>
        <div class="input-group">
            <label>Product Brand:</label>
            <br>
            <input type="text" name="brand"  placeholder="Product Brand" value="<?php if (isset($_POST['brand'])) echo $_POST['brand']; ?>">
            <span class="error">*</span>
        </div>
        <br>
        <div class="input-group">
            <label>Product Code:</label>
            <br>
            <input type="text" name="code" pattern="[P]\d{3}" 
            title="Product Code format:'PXXX', XXX can only be numerical characters" placeholder="Product Code" 
            value="<?php if (isset($_POST['code'])) echo $_POST['code']; ?>">
            <span class="error">*</span>
        </div>
        <br>
        <div class="input-group">
            <label>Price: </label>
            <br>
            <input type="text" name="price" pattern="\d+.\d{1,2}" 
            title="The number after the decimal can only contain a maximum of 2 digits." placeholder="Price" 
            value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">
            <span class="error">*</span>
        </div>
        <div>
            <label>Image: </label>
            <br>
            <input style= "width:500px" type="file" name="image" placeholder="Image Src" value="image">
        </div>
        <br>
        
        <div class="input-group">
            <button type="submit" class="btn" name="add_product_btn">Add Product</button>
        </div>
        <br>
        <?php echo display_error(); ?>
        
    </form>
    <div class="cancelContainer"> 
    <a href="viewProduct.php"><button class="cancel">Cancel</button></a>
    </div>
    
    <hr style="opacity: 0.2; margin-top: 2.25rem;">

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
    <p class="footer-subheader">ABOUT</p><br>
    <a href="#">About Us</a><br>
    <a href="#">Contact Us</a><br>
    <a href="#">FAQS</a><br>

   
</div>
    <div class="footer-right">
        <p class="footer-subheader">CUSTOMER SERVICE</p><br>
        <a href="#">Shipping Information</a><br>
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