<?php

/*
 * Author: Liz, Tyler, zizi
 * Date: 04/09/2014
 * Name: wine.class.php
 * Description: the Wine class models a real-world wine.
 */

class Wine {

    //private data members
    private $id, $name, $short_description, $price_750ml, $year, $long_description, $Image_file;

    public function __construct($name, $short_description, $price_750ml, $year, $long_description, $Image_file) {
        $this->name = $name;
        $this->short_description = $short_description;
        $this->price_750ml = $price_750ml;
        $this->year = $year;
        $this->long_description = $long_description;
        $this->Image_file = $Image_file;
    }
    
    //getter methods
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getShort_Description() {
        return $this->short_description;
    }

    public function getPrice_750ml() {
        return $this->price_750ml;
    }

    public function getYear() {
        return $this->year;
    }

    public function getLong_Description() {
        return $this->long_description;
    }

    public function getImage_File() {
        return $this->Image_file;
    }




    //set wine id
    public function setId($id) {
        $this->id = $id;
    }
}

?>