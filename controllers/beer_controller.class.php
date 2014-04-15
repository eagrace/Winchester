<?php

/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * File: beer_controller.class.php
 * Description: the beer controller
 *
 */

class BeerController {

    private $beer_model;

    //default constructor
    public function __construct() {
        //create an instance of the BeerModel class
        $this->beer_model = new BeerModel();
    }

    //index action that displays all beers
    public function index() {
        //retrieve all beers and store them in an array
        $beers = $this->beer_model->list_beer();

        //disply all beers
        if ($beers) {
            $view = new Beer_Index();
            $view->display($beers);
        } else {
            //display an error
            $message = "There was a problem displaying beers.";
            $this->error($message);
        }
    }

    //show details of a beer
    public function detail($id) {
        //retrieve the specific beer
        $beer = $this->beer_model->view_beer($id);
        
        //display beer details
        if ($beer) {
            //display beer details
            $view = new Beer_Detail();
            $view->display($beer);
        } else {
            //display an error
            $message = "There was a problem displaying the beer. The beer id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new Beer_Error();

        //display the error page
        $error->display($message);
    }

    
    //diplay a beer in a form for editing
    public function edit($id) {
        //retrieve the specific beer
        $beer = $this->beer_model->view_beer($id);
        
        //display beer details in a form to be modified
        if ($beer) {
            $view = new Beer_Edit();
            $view->display($beer);
        } else {
            //display an error
            $message = "There was a problem editing the beer. The beer id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }

    //update a beer in the database
    public function update($id) {
        //call the updateBeer method to update the beer
        if ($this->beer_model->update_beer($id)) {
            //display the update details
            //header("Location: " . base_url . "/beer/detail/" . $id);
            $view = new Beer_Update();
            $view->display($id);
        } else {
            //display an error
            $message = "There was a problem updating the beer. The beer id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }
    
    
    //search beers
    public function search($name) {
        //retrieve name from a textbox named "title"
        if (isset($_GET['name']))
            $name = trim($_GET['name']);

        //retrieve all beers and store them in an array
        if (($query = $this->beer_model->search_beer($name)) >= 0) {
            //search succeeded, display beers found
            $view = new Beer_Search();
            $view->display($query);
        } else {
            //return value is false. seach failed.
            $message = "There was a problem searching the database.";
            $this->error($message);
        }
    }

    //autosuggestion
    public function suggest($name) {
        //search the database for matched beers.
        $beers = $this->beer_model->search_beer($name);

        // Set the XML header
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

        // create the <titles> element
        $output = '<titles>';

        // if there are beers returned, loop through them and add them to the output
        if ($beers) {
            foreach ($beers as $beer)
                $output .= '<title>' . $beer->getName() . '</title>';
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