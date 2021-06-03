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
    header("location:../redirectAdmin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="icon" href="../image/logo.png">
    <link href="../style.css" type="text/css" rel="stylesheet"/> 
<style> 
.title{
  width:50%;
  margin: 50px auto 0px;
  font-size: 24px;
  color: #fff;
  background-color: #d33737;
  text-align: center;
  border: 5px solid #d33737;
  border-bottom: none;
  padding: 20px;
  font-family: "Comic Sans MS", cursive, sans-serif;
}

form{
border: 5px solid #d33737; 
margin: auto; 
}

.button{ 
background-color:#000 ;
font-size: 16px;
border: 2px solid #000;
color:#fff; 
}

.button:hover{ 
border: 2px solid #000;
}

.errormessage{
  width:50%;
  margin: 50px auto 0px;
  border: 5px solid #d33737;

  text-align: center; 
font-size: 12px;
text-decoration: Capitalize;

}
.cancelContainer{
text-align: center;
padding-top: 5px;
padding-bottom: 10px;
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
           
<body> 

<?php 
// This page is for editing a product.

$page_title = 'Edit a Product';

// Check for a valid product ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From viewProduct.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	exit();
}

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array();
	
	// Check for a first name:
	if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your product name.';
	} else {
		$pn = mysqli_real_escape_string($db, trim($_POST['name']));
	}
	
	// Check for the product brand:
	if (empty($_POST['brand'])) {
		$errors[] = 'You forgot to enter your product brand.';
	} else {
		$pb = mysqli_real_escape_string($db, trim($_POST['brand']));
	}

	// Check for the product code:
	if (empty($_POST['code'])) {
		$errors[] = 'You forgot to enter your product code.';
	} else {
		$pc = mysqli_real_escape_string($db, trim($_POST['code']));
	}
	
	if (empty($_POST['image'])) {
	    $errors[] = 'You forgot to enter your image source.';
	} else {
	    $pi = mysqli_real_escape_string($db, trim($_POST['image']));
	}
	
	if (empty($_POST['price'])) {
	    $errors[] = 'You forgot to enter the product price.';
	} else {
	    $pp = mysqli_real_escape_string($db, trim($_POST['price']));
	}
	
	
	if (empty($errors)) { // If everything's OK.
	
		//  Test for unique code:
		$q ="SELECT id FROM products WHERE code='$pc' AND id != $id";
		$r = @mysqli_query($db, $q);

		
		if (mysqli_num_rows($r) == 0) {
            
			// Make the query:
			$q="UPDATE products SET name='$pn', brand='$pb', code='$pc', image='$pi', price='$pp' WHERE id=$id LIMIT 1";
			$r = @mysqli_query ($db, $q);
			
			
			if (mysqli_affected_rows($db) == 1) { // If it ran OK.
			    $_SESSION['success'] ="The Product has been edited!";
			    header('location: viewProduct.php');
			    
				// Print a message:
				
			} else { // If it did not run OK.
			    echo '<div class="errormessage">';
			    echo '<p class="error">ERROR MESSAGE</p>';
				echo '<p class="error">The product could not be edited due to a system error.
                         We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($db) . '<br />Query: ' . $q . '</p>'; // Debugging message.
				echo '</div>';
				
			}
				
		} else { // Prevent duplication of product code
		    echo '<div class="errormessage">';
		    echo '<p class="error">ERROR MESSAGE</p>';
			echo '<p class="error">The product code has already been taken.</p>';
			echo '</div>';
			
		}
		
	} else { // Report the errors.
	    echo '<div class="errormessage">';
	    echo '<p class="error">ERROR MESSAGE</p>';
		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
			echo '</div>';
			
		}
		echo '</p><p>Please try again.</p>';
	
	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the product's information:
?>

<?php 
echo '<h2 class="title">Edit Product Details</h2>';

$q = "SELECT name, brand, code, image, price FROM products WHERE id=$id";	
$r = @mysqli_query ($db, $q);


if (mysqli_num_rows($r) == 1) { // Valid product ID, show the form.

	// Get the product's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="editProduct.php" method="post">
<p>Product Name: <input type="text" name="name" size="15" maxlength="50" value="' . $row[0] . '" /></p>
<p>Product Brand: <input type="text" name="brand" size="15" maxlength="20" value="' . $row[1] . '" /></p>
<p>Product Code: <input type="text" name="code" size="15" maxlength="10" value="' . $row[2] . '" /></p>
<p>Product Image Address: <input type="text" name="image" size="30" maxlength="100" value="'.$row[3]. '"  /> </p>

<p>Product Price: <input type="text" name="price" size="15" maxlength="10" value="' . $row[4] . '" /></p>


<p><input class="button" type="submit" name="submit" value="Submit" /></p> 
<input type="hidden" name="id" value="' . $id . '" />
</form>';
	
	
} else { // Not a valid product ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($db);
		
?>

<div class="cancelContainer"> 
    <a href="viewProduct.php"><button class="cancel">Cancel</button></a>
    </div>
</body>
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
</footer></html>