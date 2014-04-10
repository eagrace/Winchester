<?php

/*
 * Author: Louie Zhu
 * Date: Oct 26, 2012
 * File: welcome_controller.class.php
 * Description: the controller that handles request for the homepage
 *
 */
class WelcomeController {
    //put your code here
    public function index() {
        $view = new Welcome_Index();
        $view->display();
    }
}

?>