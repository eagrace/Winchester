<?php

/*
 * Author: Liz Baker
 * Date: 04/09/2014
 * File: wine_controller.class.php
 * Description: the wine controller
 *
 */

class WineController {

    private $wine_model;

    //default constructor
    public function __construct() {
        //create an instance of the WineModel class
        $this->wine_model = new WineModel();
    }

    //index action that displays all wines
    public function index() {
        //retrieve all wines and store them in an array
        $wines = $this->wine_model->list_wine();

        //disply all wines
        if ($wines) {
            $view = new Wine_Index();
            $view->display($wines);
        } else {
            //display an error
            $message = "There was a problem displaying wines.";
            $this->error($message);
        }
    }

    //show details of a wine
    public function detail($id) {
        //retrieve the specific wine
        $wine = $this->wine_model->view_wine($id);
        
        //display wine details
        if ($wine) {
            //display wine details
            $view = new Wine_Detail();
            $view->display($wine);
        } else {
            //display an error
            $message = "There was a problem displaying the wine. The wine id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new Wine_Error();

        //display the error page
        $error->display($message);
    }

    
    //diplay a wine in a form for editing
    public function edit($id) {
        //retrieve the specific wine
        $wine = $this->wine_model->view_wine($id);
        
        //display wine details in a form to be modified
        if ($wine) {
            $view = new Wine_Edit();
            $view->display($wine);
        } else {
            //display an error
            $message = "There was a problem editing the wine. The wine id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }

    //update a wine in the database
    public function update($id) {
        //call the updateWine method to update the wine
        if ($this->wine_model->update_wine($id)) {
            //display the update details
            //header("Location: " . base_url . "/wine/detail/" . $id);
            $view = new Wine_Update();
            $view->display($id);
        } else {
            //display an error
            $message = "There was a problem updating the wine. The wine id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }
    
    
    //search wines
    public function search($name) {
        //retrieve title from a textbox named "title"
        if (isset($_GET['name']))
            $name = trim($_GET['name']);

        //retrieve all wines and store them in an array
        if (($query = $this->wine_model->search_wine($name)) >= 0) {
            //search succeeded, display wines found
            $view = new Wine_Search();
            $view->display($query);
        } else {
            //return value is false. seach failed.
            $message = "There was a problem searching the database.";
            $this->error($message);
        }
    }

    //autosuggestion
    public function suggest($name) {
        //search the database for matched wines.
        $wines = $this->wine_model->search_wine($name);

        // Set the XML header
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

        // create the <titles> element
       // $output = '<titles>';
        $output = '<titles>';

        // if there are wines returned, loop through them and add them to the output
        if ($wines) {
            foreach ($wines as $wine)
                $output .= '<name>' . $wine->getName() . '</name>';
        }

        $output .= '</titles>';

        echo $output;
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
    }

}