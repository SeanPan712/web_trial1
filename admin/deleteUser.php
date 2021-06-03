<?php
// This page is for deleting a user record.

$page_title = 'Delete a User';
echo '<h1>Delete a User</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
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
<title>Delete user</title>

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
        $q="DELETE FROM users WHERE id=$id LIMIT 1";
        $r= @mysqli_query ($db, $q);
        if (mysqli_affected_rows($db)==1){ // If it ran OK.
            $_SESSION['success'] ="The user has been deleted!"; 
            header('location: viewUser.php');
            
           
            
        }else{ // If the query did not run OK.
            echo '<p class="error">The user could not be deleted due to a system error.</p>';  // Public message.
            echo '<p>' .mysqli_error($db) . '<br /Query: ' .$q . '</p>'; // Debugging message.
            
        }
        
    }else{  			 // No confirmation of deletion.
        
        echo  '<p>The user has NOT been deleted.</p>';
    }
    
    
    
} else { // Show the form.
    
    // Retrieve the user's information:
    $q = "SELECT CONCAT(lastname, ', ', firstname) FROM users WHERE id=$id";
    $r = @mysqli_query ($db, $q);
    
    if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.
        
        // Get the user's information:
        $row = mysqli_fetch_array ($r, MYSQLI_NUM);
        
        // Display the record being deleted:
        echo "<h3>Name: $row[0]</h3>
		Are you sure you want to delete this user?";
        
        // Create the form:
        echo '<form action="deleteUser.php" method="post">
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
