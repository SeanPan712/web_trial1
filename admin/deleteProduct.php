<?php
// This page is for deleting a user record.

$page_title = 'Delete a Product';
echo '<h1>Delete a Product</h1>';

// Check for a valid Product ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From viewProduct.php
    $id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
    $id = $_POST['id'];
} else { // No valid ID, kill the script.
    echo '<p class="error">This page has been accessed in error.</p>';
    exit();
}
require('../functions.php');
//require('../mysqli_connect.php'); //Connect to db

?>
<!DOCTYPE html> 
<html>
<head>
<title>Delete Product</title>

<style>

body{
 font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
 text-align:center;
 width: 100%;   
}
div{
margin: auto;
text-align:center;
width: 50%;
background-color: ;
border: 5px solid black ;
border-radius: 5px;
}
</style>

</head>

<body>

<div>
<?php 
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if($_POST['sure']=='Yes'){ // Delete the record.
        
        
        // Make the query:
        $q="DELETE FROM products WHERE id=$id LIMIT 1";
        $r= @mysqli_query ($db, $q);
        if (mysqli_affected_rows($db)==1){ // If it ran OK.
            $_SESSION['success'] ="The product has been deleted!";
            header('location: viewProduct.php');
            
        }else{ // If the query did not run OK.
            echo '<p class="error">The product could not be deleted due to a system error.</p>';  // Public message.
            echo '<p>' .mysqli_error($db) . '<br /Query: ' .$q . '</p>'; // Debugging message.
            
        }
        
    }else{  			 // No confirmation of deletion.
        header('location: viewProduct.php');
        
    }
    
    
    
} else { // Show the form.
    
    // Retrieve the product's information:
    $q = "SELECT CONCAT(name, ' (Product Code:', code, ')') FROM products WHERE id=$id";
    $r = @mysqli_query ($db, $q);
    
    if (mysqli_num_rows($r) == 1) { // Valid product ID, show the form.
        
        // Get the product's information:
        $row = mysqli_fetch_array ($r, MYSQLI_NUM);
        
        // Display the record being deleted:
        echo "<h3>Name: $row[0]</h3>
		Are you sure you want to delete this product?";
        
        // Create the form:
        echo '<form action="deleteProduct.php" method="post">
	<br><input type="radio" name="sure" value="Yes" /> Yes
	<input type="radio" name="sure" value="No" checked="checked" /> No <br><br>
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
        
    } else { // Not a valid user ID.
        echo '<p class="error">This page has been accessed in error.</p>';
    }
    
} // End of the main submission conditional.

mysqli_close($db);

?>
</div>
</body>
</html>
