<?php
/*
 * Author: Louie Zhu
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
                <link rel='shortcut icon' href='<?= base_url ?>/www/img/favicon.ico' type='image/x-icon'>
                <link type='text/css' rel='stylesheet' href='<?= base_url ?>/www/css/app_style.css'>
                <!--<link type='text/css' rel='stylesheet' href='<?= base_url ?>/www/css/option.css'> -->
                <script src="<?= base_url ?>/www/js/ajax_autosuggestion.js"></script>
                <style>

                </style>
            </head>
            <body>
                <div id='wrapper'>

                    <div id="banner">
                        <div id='curdate'>
                            <?php echo date('l, F d, Y', time()) ?>
                        </div>                        
                            <img src="<?= base_url ?>/www/img/shoppingcart_empty.gif" style="width: 60px; background-color: #0cf; border: none; margin-right: 20px; float: right" />
                            <div id="logo">
                                <a href="<?= base_url ?>/index.php" style="text-decoration: none" title="Winchester II">
                                    <img src='<?= base_url ?>/www/img/logo.png' style="width: 180px; border: none" />
                                </a>
                                <span style='color:white; font-size: 36pt; font-weight: bold; vertical-align: top'>
                                    Winchester II
                                </span>
                            <span style='color: white; font-size: 14pt; font-weight: bold'>Buy Beer and Wine Online!</span>
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
