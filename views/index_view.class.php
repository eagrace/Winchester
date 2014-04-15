<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="includes/reelslideshow.js" type="text/javascript">

/***********************************************
* Continuous Reel Slideshow- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

</script>

<head>
<script type="text/javascript">

var firstreel=new reelslideshow({
	wrapperid: "myreel", //ID of blank DIV on page to house Slideshow
	dimensions: [670, 292], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
		["includes/churchhill_1.jpg"], //["image_path", "optional_link", "optional_target"]
		["includes/churchhill_2.jpg"],
		["includes/churchhill_3.jpg"],
		["includes/churchhill_4.jpg"] //<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:2000, cycles:2, pauseonmouseover:true},
	orientation: "h", //Valid values: "h" or "v"
	persist: true, //remember last viewed slide and recall within same session?
	slideduration: 1200 //transition duration (milliseconds)
})

</script>

<?php
/*
 * Author: Liz, tyler, zizi
 * Date: 10/15/2013
 * Name: index_view.class.php
 * Description: the parent class for all view classes. The two functions display page header and footer.
 */


class IndexView {

    //this method displays the page header
    protected function displayHeader($title) {
        //set time zone
        date_default_timezone_set('America/New_York');
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title> <?php echo $title ?> </title>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link rel='shortcut icon' href='<?= base_url ?>/www/img/favi.ico' type='image/x-icon'>
                <link type='text/css' rel='stylesheet' href='<?= base_url ?>/www/css/app_style.css'>
                <!--<link type='text/css' rel='stylesheet' href='<?= base_url ?>/www/css/option.css'> -->
                <script src="<?= base_url ?>/www/js/ajax_autosuggestion.js"></script>
                <style>

                </style>
            </head>
            <body>
                <div id='wrapper'>

                    <div id="banner">
                        <div id='curdate' style="padding-right:60px">
                            <?php echo date('l, F d, Y', time()) ?>
                        </div>        
                            <div id="shoppingcart">
                                <a href="#"><img src="<?= base_url ?>/www/img/" style="width: 60px; margin-right: 30%; margin-top: 10px; background-color: #0cf; border: none; margin-right: 20px; float: right"<?php  ?>
                                                 alt="Shopping cart" width="60" border="0"/><br /><?php  ?> item(s)</a>
                                </a>
                            </div>             
                            <div id="logo">
                                <a href="<?= base_url ?>/index.php" style="text-decoration: none" title="Winchester II">
                                    <img src='<?= base_url ?>/www/img/beerandwine.png' style="width: 300px; padding-bottom:40px; border: none" />
                                </a>
                                <span style='color:white; font-size: 26pt; vertical-align: top'>
                                   Winchester II
                                </span>
                        </div>
                        <div id="nav">
 				<ul>
					<li> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;
                                            <a href="index.php"><img src="<?= base_url ?>/www/img/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;Home</a></li>
                                        <li><a href="#"><img src="<?= base_url ?>/www/img/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;About Us</a></li>
					<li><a href="#"><img src="<?= base_url ?>/www/img/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;Craft Beers</a></li>
					<li><a href="#"><img src="<?= base_url ?>/www/img/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;Contact</a></li>
                                        <li><a href="#"><img src="<?= base_url ?>/www/img/ico_arrow.png" style="width: 16px;height: 16px">&nbsp;Search Beer</a></li>
                                        <li><img src="<?= base_url ?>/www/img/ico_arrow.png" style="width: 16px;height: 16px">&nbsp; <?php
                                               /* if ($role == 1) 
                                                { //send to add beer form form page
                                                    echo"<a href='#'>Add Beer</a>  ";                                                  
                                                }
                                                if (empty($login)) //if not logged in send to user login form
                                                        echo "<a href='#'>Login</a>";
                                                else 
                                                {   //display user logout link and display user's name
                                                     echo "<a href='user_logout.php'>" . "<?= base_url ?>/www/img/ico_arrow.png' style='width: 16px;height: 16px'>&nbsp" . "Logout</a>";
                                                     echo "<span style='color:green; margin-left:30px'> Welcome " . $login . "!</span>";
                                                }*/
                                      
                                            ?>
                                        </li>                                        
                                        &nbsp;&nbsp; &nbsp; <!-- display social media buttons -->
                                        <li><a href="http://www.facebook.com"><img src="<?= base_url ?>/www/img/f.png"></a></li>
                                        <li><a href="http://www.twitter.com"><img src="<?= base_url ?>/www/img/t.png"></a></li>

				</ul>                            
                        </div>
                    </div>
                    <div id="mainbody"> 
                        <?php
                    }

                    //end of displayHeader method
                    //this method displays the page footer
                    protected function displayFooter() {
                        ?>
                    </div>
                    <div id="footer">
                        <br /><br />
                        <hr width='95%' />
                        &copy <?= date("Y") ?> The Winchester II. All Rights Reserved.
                    </div>
                </div>
            </body>
        </html>
        <?php
    }

//end of displayFooter method
}
?>
