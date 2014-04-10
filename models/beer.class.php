<?php

/*
 * Author: Liz, tyler, Zizi
 * Date: 04/09/2014
 * Name: beer.class.php
 * Description: the Beer class models a real-world beer.
 */

class Beer {

    //private data members
            private $id, $name, $short_description, $price_32, $ABV, $IBU, $long_description, $Image_file;

    //the constructor
    public function __construct($name, $short_description, $price_32, $ABV, $IBU, $long_description, $Image_file) {
        $this->name = $name;
        $this->short_description = $short_description;
        $this->price_32 = $price_32;
        $this->ABV = $ABV;
        $this->IBU = $IBU;
        $this->long_description = $long_description;
        $this->Image_file = $Image_file;
    }

    //return the id of a beer
    public function getId() {
        return $this->id;
    }

    //return the name of a beer
    public function getName() {
        return $this->name;
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