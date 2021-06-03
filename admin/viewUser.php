<?php
require('../functions.php');
//require('../mysqli_connect.php');

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
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../image/logo.png">
	<title>View User</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
<style>

body{
 font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;

}

a{
color: black;
}
td a{
color:#000;
text-decoration: underline; 

}

td a:hover{
color:#d33737;
}

button{ 
background-color:#0066ff; 
color: #fff;
width:50px;
padding: 5px;
border-radius: 5px;
border: solid 2px #0066ff;
}

button:hover{
background-color:#1a0000; 
border: solid 2px #1a0000;
}
.delete{
background-color:#ff4d4d; 
padding: 5px;
color: #fff;
width:70px;
border-radius: 5px;
border: solid 2px #ff4d4d;

}

.delete:hover{
background-color:#1a0000; 
border: solid 2px #1a0000;

}

h4{
text-align: center;
}


.userTitle{
    display: flex;
    align-items: center;
    margin: auto;

}

.userTitle h1{
margin-left: 45%;
}


.userTitle button{
width: 100px;
height: 40px;
margin-left:30px;
background-color:#00cc00;
border: solid 2px #00cc00;


}

.userTitle button:hover{
background-color:#000;
border: solid 2px #000;


}



</style>

</head>
<body><!--header & navbar-->

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
    
    
<div class="userTitle"> 
<h1>User</h1>
<a href="addUser.php"><button>Add user</button></a>

</div>
           <?php if (isset($_SESSION['success'])) : ?>
		<h4>
			<?php 
				echo $_SESSION['success']; 
			   unset($_SESSION['success']);
				
			?>
		</h4>

<?php endif ?>
	

<?php 


// This script retrieves all the records from the users table.
$display = 5;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
    $pages = $_GET['p'];
} else { // Need to determine.
    // Count the number of records:
    $q = "SELECT COUNT(id) FROM users";
    $r = @mysqli_query ($db, $q);
    $row = @mysqli_fetch_array ($r, MYSQLI_NUM);
    $records = $row[0];
    // Calculate the number of pages...
    if ($records > $display) { // More than 1 page.
        $pages = ceil ($records/$display);
    } else {
        $pages = 1;
    }
} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
    $start = $_GET['s'];
} else {
    $start = 0;
}

// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'ut';

// Determine the sorting order:
switch($sort){
    case'ln':
        $order_by='lastname ASC';
        break;
    case 'fn':
        $order_by='firstname ASC';
        break;
    case 'ut':
        $order_by='user_type ASC';
        break;
    case 'em':
        $order_by='email ASC';
        break;
    default:
        $order_by='user_type ASC';
        $sort ='ut';
        break;
}

// Define the query:
$q = "SELECT lastname, firstname, id, user_type, email FROM users ORDER BY $order_by LIMIT $start, $display";
$r = @mysqli_query ($db, $q) or die (mysqli_error($db));// Run the query.

// Table header:
echo '<table align="center" cellspacing="5" cellpadding="5" width="100%" >
<tr>
	<td align="center"><b>Edit</b></td>
	<td align="center"><b>Delete</b></td>
	<td align="center"><b><a href="viewUser.php?sort=fn">First Name</a></b></td>
	<td align="center"><b><a href="viewUser.php?sort=ln">Last Name</a></b></td>
	<td align="center"><b><a href="viewUser.php?sort=em">Email</a></b></td>
    <td align="center"><b><a href="viewUser.php?sort=ut">User Type</a></b></td>

    
</tr>'
;
// Fetch and print all the records....
$bg = '#eeeeee';
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
    echo '<tr bgcolor="' . $bg . '">
		<td align="center"><a href="editUser.php?id=' . $row['id'] .'"><button>Edit</button></a></td>
		<td align="center"><a href="deleteUser.php?id=' . $row['id'] .'"><button class="delete">Delete</button></a></td>
		<td align="center">' . $row['lastname'] .'</td>
		<td align="center">' . $row['firstname'] .'</td>
		<td align="center">' . $row['email'] .'</td>
		<td align="center">' . $row['user_type'] .'</td>

	</tr>
	';
} // End of WHILE loop.

echo '</table>';
mysqli_free_result ($r);
mysqli_close($db);

// Make the links to other pages, if necessary.
if ($pages > 1) {
    
    echo '<br /><p>';
    $current_page = ($start/$display) + 1;
    
    // If it's not the first page, make a Previous button:
    if ($current_page != 1) {
        echo '<a href="viewUser.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
    }
    
    // Make all the numbered pages:
    for ($i = 1; $i <= $pages; $i++) {
        if ($i != $current_page) {
            echo '<a href="viewUser.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
        } else {
            echo $i . ' ';
        }
    } // End of FOR loop.
    
    // If it's not the last page, make a Next button:
    if ($current_page != $pages) {
        echo '<a href="viewUser.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
    }
    
    echo '</p>'; // Close the paragraph.
    
} // End of links section.

?>
</body>
</html>
