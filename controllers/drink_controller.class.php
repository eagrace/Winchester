<?php

/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * File: drink_controller.class.php
 * Description: the drink controller - this is where we have the logic of drink to be placed in a 
 * shopping cart for the user to order.
 *
 */
class DrinkController {
 
    private $drink_name;  //drink
    private $drink_quantity;  //drink quantity
    private $price_per_drink;  //price per drink
    private static $user_name;   //user name
    private static $user_id; //user id

    //default constructor
    public function __construct($beer, $wine, $count, $price_per_drink) {
        //create an instance of the DrinkModel class
        $this->drink_model = new DrinkModel();
        $this->drink_name = $beer || $this->drink_name = $wine;
        $this->drink_quantity = $count;
        $this->price_per_drink = $price_per_drink;
        self::$user_name;
        self::$user_id;
    }
 
    //index action that displays everything in user's cart
    public function index() {
        //retrieve all drinks and store them in an array
        $drinks = $this->drink_model->list_drink();
        
 
        //disply all items in shopping cart
        if ($drinks) {
            $view = new Drink_Index();
            $view->display($drinks);
        } else {
            //display an error
            $message = "There was a problem displaying items in your shopping cart.";
            $this->error($message);
        }
    }
 
    //show details of drinks in your shopping cart
    public function detail($id) {
        //retrieve the specific movie
        $drink = $this->drink_model->view_drink($id);
        //$beer = $this->beer_model->view_beer($id);
        //$wine = $this->wine_model->view_wine($id);
        
        //display drink details
        if ($drink) {
            //display drink details
            $view = new Drink_Detail();
            $view->display($drink);
        } else {
            //display an error
            $message = "There was a problem displaying the shopping cart. The drink id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }
 
    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new Drink_Error();
 
        //display the error page
        $error->display($message);
    }
 
    
    //diplay the shopping cart in a form for editing
    public function edit($drinks) {
        //retrieve the specific movie
        $drink = $this->drink_model->view_cart($drinks);
        
        //display shopping cart details in a form to be modified
        if ($drink) {
            $view = new Drink_Edit();
            $view->display($drink);
        } else {
            //display an error
            $message = "There was a problem editing your shopping cart. The drink id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }
 
    //update a movie in the database
    public function update($drinks) {
        //call the updateDrink method to update the drink in the shopping cart
        if ($this->drink_model->update_drink($drinks)) {
            //display the update details
            //header("Location: " . base_url . "/movie/detail/" . $id);
            $view = new Drink_Update();
            $view->display($drinks);
        } else {
            //display an error
            $message = "There was a problem updating your shopping cart. The item id '" . $id . "' does not exist in the database.";
            $this->error($message);
        }
    }
    
 
    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";
 
        $this->error($message);
    }
 
}















/*
 * Author: Louie Zhu
 * Date: Feb 23, 2014
 * Name: invoice.class.php
 * Description: Invoice class represents a smiple invoice. The class implements Payable interface.
 */
 
class Drink implements Payable {
    private $part_number;  //part number
    private $part_description;  //part description
    private $quantity;  //quantity
    private $price_per_item;  //item price
    private static $invoice_num;   //invoice number
 
    //constructor
    public function __construct($part, $description, $count, $price) {
        $this->part_number = $part;
        $this->part_description = $description;
        $this->quantity = $count;
        $this->price_per_item = $price;
        self::$invoice_num++;
    }
 
    //getters
    public function getPartNumber() {
        return $this->part_number;
    }
 
    public function getPartDescription() {
        return $this->part_description;
    }
 
    public function getQuantity() {
        return $this->quantity;
    }
 
    public function getPricePerItem() {
        return $this->price_per_item;
    }
 
    //method required to carry out contract with interface Payable
    public function getPaymentAmount() {
        return $this->getQuantity() * $this->getPricePerItem();
    }
 
    //return String represenation of Invoice object
    public function toString() {
        echo "<b>Invoice:</b>";
        echo "<br />Part number: " . $this->getPartNumber() . " (" . $this->getPartDescription() . ")";
        echo "<br />Quantity: " . $this->getQuantity();
        printf("<br />Price per item: $%.2f", $this->getPricePerItem());
        printf("<br />Payment: $%.2f", $this->getPaymentAmount());
    }
 
    //static method returns number of invoices
    public static function getInvoiceNum() {
        return self::$invoice_num;
    }
 
}
 
?>