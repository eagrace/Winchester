<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
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



?>
<html>
	<head>
		<title><?php echo $page_title; ?></title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="includes/option.css" />
                <script
                    type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
                //for the #reel
                </script>



	</head>
	<body>
		<div id="header">
                   

                      

			<div id="nav">
                            
                            
                            <h1 id="winchester">The Winchester Brewing Co.</h1>&nbsp;
                            <div id="shoppingcart">
                                <a href="showcart.php"><img src="includes/<?php echo $shoppingcart_img ?>" alt="Shopping cart" width="60" border="0"/><br /><?php echo $count ?> item(s)</a>
                                </a>
                            </div>
                            
                            
                            
				<ul>
					<li> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
                                             &nbsp;  &nbsp; <a href="index.php"><img src="includes/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;Home</a></li>
                                        <li><a href="aboutus.php"><img src="includes/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;About Us</a></li>
                                       <!-- <li><a href="Wherearewe.php">Where Are We?</a></li>-->
					<li><a href="craftBeer.php"><img src="includes/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;Craft Beers</a></li>
					<li><a href="contact.php"><img src="includes/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;Contact</a></li>
                                        <li><a href="searchbeer.php"><img src="includes/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;Search Beer</a></li>
                                        <li><img src="includes/ico_arrow.png" style="width: 16px;height: 16px">&nbsp; <?php
                                                if ($role == 1) 
                                                    {
                                                    echo"<a href='add_beer_form.php'>Add Beer</a>  ";
                                             
                                                    
                                                  }
                                                if (empty($login)) 
                                                        echo "<a href='user_login_form.php'>Login</a>";
                                                else 
                                                {
                                                     echo "<a href='user_logout.php'>" . "<img src='includes/ico_arrow.png' style='width: 16px;height: 16px'>&nbsp" . "Logout</a>";
                                                     echo "<span style='color:green; margin-left:30px'> Welcome " . $login . "!</span>";
                                                }
                                      
                                            ?>
                                        </li>                                        
                                        &nbsp;&nbsp; &nbsp; 
                                        <li><a href="http://www.facebook.com"><img src="includes/f.png"></a></li>
                                        <li><a href="http://www.twitter.com"><img src="includes/t.png"></a></li>

				</ul>
                            

                            
			</div><!-- end of nav div-->
		</div><!-- end of header div-->
		
                <div id="content">
