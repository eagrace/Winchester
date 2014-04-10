<?php

/**
 * Author: Liz, tyler, Zizi
 * Date: 04/09/2014
 * Name: dispatcher.class.php
 * Description: application dispatcher responsible for dissecting in pieces the requested URL and
 * routing the request to the proper method of the matched controller.
 * A typical url looks like this: http://localhost/i211/winchester/beer/view/1. In this url,
 * beer is the controller, view is the method, and 1 is the parameter.
 */
class Dispatcher {
    //dispatch request to the appropriate controller/method
    public static function dispatch() {
        //split the uri into url and querystrings
        $url_array = explode('?', trim($_SERVER['REQUEST_URI'], '/'));

        //extract components in url and store them in an array.
        $url_array = explode('/', $url_array[0]);

        //remove the root folder name from the array if there is
        //array_shift($url_array);
        while(array_search(basename(getcwd()), $url_array) !== FALSE) {
            array_shift($url_array);
        }
        
        //strip off index.php or index from the beginning of url if present 
        if (count($url_array) > 0 && ($url_array[0] == "index.php" or $url_array[0] == "index"))
            array_shift($url_array);

        //get controller name or assign the default controller "WelcomeController"
        $controllerName = !empty($url_array[0]) ? ucfirst($url_array[0]) . 'Controller' : 'WelcomeController';

        //get method name or assign the default method "index"
        $method = !empty($url_array[1]) ? $url_array[1] : 'index';

        //remove .php from the method name if present
        if (strpos($method, '.'))
            $method = substr($method, 0, strpos($method, '.'));

        //get argument passed into the method
        $arg = !empty($url_array[2]) ? $url_array[2] : NULL;

        //create controller instance and call the specified method
        $controller = new $controllerName;
        $controller->$method($arg);
    }
}