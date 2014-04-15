<?php

/*
 * Author: Liz, tyler, Zizi
 * Date: 04/09/2014
 * Name: cart.class.php
 * Description: the Cart class models a real-world cart.
 */

class Cart {

    //private data members
            private $id, $item, $beer, $wine;

    //the constructor
    public function __construct($item, $beer, $wine) {
        $this->item = $item;
        $this->beer = $beer;
        $this->wine = $wine;
    }
    //return the id of a cart
    public function getId() {
        return $this->id;
    }

    //return the name of a cart
    public function getItem() {
        return $this->beer . $this->wine;
    }


    //set cart id
    public function setId($id) {
        $this->id = $id;
    }

}