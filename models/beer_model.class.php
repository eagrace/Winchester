<?php

/*
 * Author: Liz, Tyler, Zizi
 * Date: 04/09/2014
 * File: beer_model.class.php
 * Description: the beer model
 * 
 */

class BeerModel {

    //private data members
    private $db;
    private $dbConnection;

    //the constructor. It initializes two data members.
    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    /*
     * the list_beer method retrieves all beers from the database and
     * returns an array of Beer objects if successful or false if failed.
     * Beers should also be filtered by price and/or sorted by names or rating if they are available.
     */

    public function list_beer() {
        //Construct the MySQL select statement.
        $sql = "SELECT * FROM " . $this->db->getBeerTable();

        //execute the query
        $query = $this->dbConnection->query($sql);
        
        //handle the result
        if ($query && $query->num_rows > 0) {
            //create an array to store all returned beers
            $beers = array();

            //loop through all rows in the returned recordsets
            while ($query_row = $query->fetch_assoc()) {

                //create a Beer object
                $beer = new Beer($query_row['name'],
                                $query_row['short_description'],
                                $query_row['price_32'],
                                $query_row['ABV'],
                                $query_row['IBU'],
                                $query_row['long_description'],
                                $query_row['Image_file']);

                //set the id for the beer
                $beer->setId($query_row["id"]);
                //add the beer into the array
                $beers[] = $beer;
            }
            return $beers;
        }

        return false;
    }

    /*
     * the view_beer method retrieves the details of the beer specified by its id
     * and returns a beer object. Return false if failed.
     */

    public function view_beer($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->db->getBeerTable() . " WHERE id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $query_row = $query->fetch_assoc();

            //create a beer object
            $beer = new Beer($query_row['name'],
                            $query_row['short_description'],
                            $query_row['price_32'],
                            $query_row['ABV'],
                            $query_row['IBU'],
                            $query_row['long_description'],
                            $query_row['Image_file']);

            //set the id for the beer
            $beer->setId($query_row["id"]);

            return $beer;
        }

        return false;
    }

    //search the database for beers that match words in names. Return an array of beers if succeed; false otherwise.
    public function search_beer($name) {
        //select statement
        $sql = "SELECT * FROM " . $this->db->getBeerTable() . " WHERE name LIKE '%" . $name . "%'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false. 
        if (!$query)
            return false;

        //search succeeded, but no beer was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 beer found.
        //create an array to store all the returned beers
        $beers = array();

        //loop through all rows
        while ($query_row = $query->fetch_assoc()) {

            //create a beer object
            $beer = new Beer($query_row['name'],
                            $query_row['short_description'],
                            $query_row['price_32'],
                            $query_row['ABV'],
                            $query_row['IBU'],
                            $query_row['long_description'],
                            $query_row['Image_file']);

            //set the id for the beer
            $beer->setId($query_row["id"]);
            //add the beer into the array
            $beers[] = $beer;
        }
        return $beers;
    }
    
    //update a beer in the database. Details of the beer are posted in a form. Return true if succeed; false otherwise.
    public function update_beer($id) {
        //retrieve beer details

        $name = isset($_POST['name']) && ($_POST['name'] != "") ? $_POST['name'] : null;
        $short_description = isset($_POST['short_description']) && ($_POST['short_description'] != "") ? $_POST['short_description'] : null;
        $price_32 = isset($_POST['price_32']) && ($_POST['price_32'] != "") ? $_POST['price_32'] : null;
        $ABV = isset($_POST['ABV']) && ($_POST['ABV'] != "") ? $_POST['ABV'] : null;
        $IBU = isset($_POST['IBU']) && ($_POST['IBU'] != "") ? $_POST['IBU'] : null;
        $long_description = isset($_POST['long_description']) && ($_POST['long_description'] != "") ? $_POST['long_description'] : null;
        $Image_file = isset($_POST['Image_file']) && ($_POST['Image_file'] != "") ? $_POST['Image_file'] : null;

        //make sure none of them is null
        if ($name && $short_description && $price_32 && $ABV && $IBU && $Image_file) {
            //query string for update 
            $sql = "UPDATE " . $this->db->getBeerTable() .
                   " SET name='$name', short_description='$short_description', price_32='$price_32', ABV='$ABV', IBU='$IBU', long_description='$long_description', Image_file='$Image_file' WHERE id='$id'";

            //execute the query
            return $this->dbConnection->query($sql);
        }
        return false;
    }
}