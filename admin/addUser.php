<?php 
require ('../functions.php');
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="icon" href="../image/logo.png">
    <link href="../style.css" type="text/css" rel="stylesheet"/> 

<style>
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
           
			
    <!--Register-->
    <h2 class="register-header">Add New User</h2>

    <form class="register" method="post" action="addUser.php">

        <div class="input-group">
            <label>Email: </label>
            <br>
            <input type="email" name="email" pattern="[a-z0-9._]+@[a-z0-9.]+\.[a-z.]{2,}$" title="Please Enter A valid Email Address." placeholder="Email" value="<?php echo $email; ?>">
            <span class="error">*</span>
        </div>
        <br>
        <div class="input-group">
            <label>First Name: </label>
            <br>
            <input type="text" name="firstname"  pattern="[0-9a-zA-z.]+" title="Please enter a valid first name" placeholder="First Name" value="">
            <span class="error">*</span>
        </div>
        <br>
        <div class="input-group">
            <label>Last Name: </label>
            <br>
            <input type="text" name="lastname" pattern="[0-9a-zA-z.]+" title="Please enter a valid last name" placeholder="Last Name" value="">
            <span class="error">*</span>
        </div>
        <br>
         <div class="input-group">
            <label>User type: </label>
            <br>
            <select name="user_type" id="user_type" >
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <span class="error">*</span>
        </div> 
        <br>
        <div class="input-group">
             <label>Password: </label>
             <br>
             <input type="password" name="password_1" pattern="(?=.*\d)(?=.*[a-zA-Z]).{6,}" title="The password must contain at least 6 characters, and it must contains at least 1 number and 1 alphabet." placeholder="Password">
             <span class="error">*</span>
        </div>
        <br>
        <div class="input-group">
            <label>Confirm Password: </label>
            <br>
            <input type="password" name="password_2" placeholder="Re-enter Password">
            <span class="error">*</span>
       </div>
       <br>
        <div class="input-group">
            <button type="submit" class="btn" name="admin_register_btn">Add User</button>
        </div>
        <br>
        <?php echo display_error(); ?>
        
    </form>
<div class="cancelContainer"> 
    <a href="viewUser.php"><button class="cancel">Cancel</button></a>
    </div>
</body>    
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