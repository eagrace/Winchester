<?php

/*
 * Author: Liz, tyler, Zizi
 * Date: 04/09/2014
 * Name: beer.class.php
 * Description: the Beer class models a real-world beer.
 */

class Drink {

    //private data members
            private $id, $drink_name, $drink_quantity, $price_per_drink, $user_name, $user_id;

    //the constructor
    public function __construct($drink_name, $beer, $wine, $count, $price_per_drink, $user_name, $user_id) {
        $this->drink_name = $beer || $this->drink_name = $wine;
        $this->drink_quantity = $count;
        $this->price_per_drink = $price_per_drink;
        self::$user_name;
        self::$user_id;
    }

    //return the id of a drink (beer or wine)
    public function getId() {
        return $this->id;
    }

    //return the name of a drink
    public function getDrinkName() {
        return $this->drink_name;
    }

    //return the short description of a beer
    public function getShort_Description() {
        return $this->short_description;
    }

    //return the price of a 32oz beer
    public function getPrice_32() {
        return $this->price_32;
    }

    //return the ABV of a beer
    public function getABV() {
        return $this->ABV;
    }

    //return the IBU name of a beer
    public function getIBU() {
        return $this->IBU;
    }

    //return the long description of a beer
    public function getLong_Description() {
        return $this->long_description;
    }

    //set beer id
    public function setId($id) {
        $this->id = $id;
    }

}