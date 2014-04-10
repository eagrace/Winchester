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