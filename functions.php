<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root','', 'shadowdb');

// variable declaration
$email    = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    register();
}

// REGISTER USER
function register(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $email;
    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $email       =  e($_POST['email']);
    $firstname   =  e($_POST['firstname']);
    $lastname    =  e($_POST['lastname']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);
    
    $selectquery= mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($selectquery)>0){
        array_push($errors, "No duplicate email is allowed");
    }
    // form validation: ensure that the form is correctly filled
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($firstname)) {
        array_push($errors, "First Name is required");
    }
    if (empty($lastname)) {
        array_push($errors, "Last Name is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        
        $query = "INSERT INTO users (email, firstname, lastname, user_type, password)
					  VALUES('$email', '$firstname','$lastname','user', '$password')";
        mysqli_query($db, $query);
        
        // get id of the created user
        $logged_in_user_id = mysqli_insert_id($db);
        
        $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
        $_SESSION['success']  = "Member Registration Successful and You are Logged in";
        header('location: index.php');
    }
}

// call the register() function if register_btn is clicked


if (isset($_POST['admin_register_btn'])) {
    admin_insert_user();
}

// REGISTER USER
function admin_insert_user(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $email;
    
    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    
    $email       =  e($_POST['email']);
    $firstname   =  e($_POST['firstname']);
    $lastname    =  e($_POST['lastname']);
    $user_type   =  e($_POST['user_type']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);
 
    $selectquery= mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($selectquery)>0){
        array_push($errors, "No duplicate email is allowed");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($firstname)) {
        array_push($errors, "First Name is required");
    }
    if (empty($lastname)) {
        array_push($errors, "Last Name is required");
    }
    if (empty($user_type)) {
        array_push($errors, "User type is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        
        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (email, firstname, lastname, user_type, password)
					  VALUES('$email','$firstname','$lastname','$user_type', '$password')";
            mysqli_query($db, $query);
            $_SESSION['success']  = "New user successfully created!!";

            header('location: viewUser.php');
        }
    }
}


  
// return user array from their id
function getUserById($id){
    global $db;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($db, $query);
    
    $user = mysqli_fetch_assoc($result);
    return $user;
}

// escape string
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
    global $errors;
    
    if (count($errors) > 0){
        echo '<div class="error">';
        foreach ($errors as $error){
            echo $error .'<br>';
        }
        echo '</div>';
    }
}	

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    }else{
        return false;
    }
}
// log user out if logout button clicked
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}

// LOGIN USER
function login(){
    global $db, $email, $errors;
    
    // grap form values
    $email = e($_POST['email']);
    $password = e($_POST['password']);
    
    // make sure form is filled properly
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);
        
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);
        
        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {
                
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: admin/home.php');
            }else{
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                
                header('location: index.php');
            }
        }else {
            array_push($errors, "Wrong email/password");
        }
    }
}

function isAdmin(){
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
        return true;
    }else{
        return false;
    }
}

$name = "";
$code = "";

// call the register() function if register_btn is clicked
if (isset($_POST['add_product_btn'])) {
    insert_product();
}

// REGISTER USER
function insert_product(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $name, $code ;
    
    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $name  = e($_POST['name']);
    $brand  = e($_POST['brand']);
    $price  = e($_POST['price']);
    $code  = e($_POST['code']);
    $image = e($_POST['image']);
    
 
    $target = "product-images/".basename($image);
    $selectquery= mysqli_query($db, "SELECT * FROM products WHERE code='$code'");
    
    if (empty($name)) {
        array_push($errors, "Product name is required");
    }  
    if (empty($code)) {
        array_push($errors, "Product code is required");
    }  
    if (mysqli_num_rows($selectquery)>0){
        array_push($errors, "A duplicate code is detected.");
    }
    if (empty($brand)) {
        array_push($errors, "Product brand is required");
    }
    if (empty($price)) {
        array_push($errors, "Product price is required");
    }
    if (empty($image)) {
        array_push($errors, "Product Image is required");
    }
    
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO products (name, brand, code, image, price)
            VALUES('$name','$brand','$code', '$target', '$price')";
        mysqli_query($db, $query);
        $_SESSION['success'] = "New product successfully inserted!";
        header('location: addProduct.php');
        
    }
        
    
}

$email = "";
$name = "";


if (isset($_POST['contactUs'])) {
    contact_form();
}

function contact_form(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $name, $email;
    
    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $name  = e($_POST['name']);
    $email  = e($_POST['email']);
    $inquiry = e($_POST['inquiry']);
    
        
    if (empty($name)) {
        array_push($errors, "Product name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($inquiry)) {
        array_push($errors, "Inquiry or message content is required");
    }
    
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO contactUs (name, email, inquiry)
            VALUES('$name','$email','$inquiry')";
        mysqli_query($db, $query);
        
    }
    
    
}



?>
