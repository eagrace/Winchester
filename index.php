<?php
/*
 * Author: Liz Baker, Tyler Spangler, Zizi
 * Date: 04/09/2014
 * Name: index.php
 * Description: The homepage
 */

require_once ("application/autoloader.class.php");

//define a constant for the application url; you may need to modify the value for your system.
define("base_url", "http://localhost/i211/winchester");

Dispatcher::dispatch();


//start the session
@session_start();

//determine the shopping cart items
$count=0;//cart items

//retrieve cart content
if(isset($_SESSION['cart']))    {
    $cart=$_SESSION['cart'];
    
    if($cart)   {
        $items = explode(',', $cart);
        $count = count($items);
    }
}
//////////begin age cookie session verification------------------------>>>>>>
//see if you're old enough....
$age = ""; 

if(isset($_GET['age'])) {
    $age = $_GET['age'];
    setcookie('age', $age, time()+600);
}

elseif  (isset($_COOKIE['age']))
    $age = $_COOKIE['age'];


//if age is set then display results in table..
if (isset($_SESSION['age']))   {
    $age = $_SESSION['age'];
}
/////////end age cookie session verification-------------------------->>>>>

 //set shopping cart image
 $shoppingcart_img = ($count == 0) ? "shoppingcart_empty.gif" : "shoppingcart_full.gif";//shopping cart image

//see if you're logged in
$login = '';
$name = '';
$role = 0;

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login']; 
}

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];    
}



//create an object of UserController
$user_controller = new UserController();

//add your code below this line to complete this file
$action = "index";

if(isset($_GET['action']) && !(empty($_GET['action'])))
    $action = $_GET['action'];

if($action === "index") {
    $user_controller->index();
} elseif ($action === "show") {
    $user_controller->show();
} elseif ($action == "sign")
{
    $user_controller->sign();
}
elseif ($action === "error") {
    //default error message
    $message = "We are sorry, but an error has occurred.";
    
    //retrieve error message
    if((isset($_GET['message'])) && !(empty($_GET['message'])))
        $message = $_GET['message'];
    
    $user_controller->error($message);
} 
else {
    $message = "Invalid action was requested";
    $user_controller->error($message);
}

?>