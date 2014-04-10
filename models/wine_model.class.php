<?php

/*
 * Author: Liz Baker, Tyler, Zizi
 * Date: 04/09/2014
 * File: wine_model.class.php
 * Description: the wine model
 * 
 */

class WineModel {

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
     * the list_wine method retrieves all wines from the database and
     * returns an array of Wine objects if successful or false if failed.
     * Wines should also be filtered by year and/or sorted by names or price if they are available.
     */

    public function list_wine() {
        //Construct the MySQL select statement.
        $sql = "SELECT * FROM " . $this->db->getWineTable();

        //execute the query
        $query = $this->dbConnection->query($sql);
        
        //handle the result
        if ($query && $query->num_rows > 0) {
            //create an array to store all returned wines
            $wines = array();

            //loop through all rows in the returned recordsets
            while ($query_row = $query->fetch_assoc()) {

                //create a Wine object
                $wine = new Wine($query_row['name'],
                                $query_row['short_description'],
                                $query_row['price_750ml'],
                                $query_row['year'],
                                $query_row['long_description'],
                                $query_row['Image_file']);

                //set the id for the wine
                $wine->setId($query_row["id"]);
                //add the wine into the array
                $wines[] = $wine;
            }
            return $wines;
        }

        return false;
    }

    /*
     * the view_wine method retrieves the details of the wine specified by its id
     * and returns a wine object. Return false if failed.
     */

    public function view_wine($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->db->getWineTable() . " WHERE id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $query_row = $query->fetch_assoc();

            //create a wine object
            $wine = new Wine($query_row['name'],
                                $query_row['short_description'],
                                $query_row['price_750ml'],
                                $query_row['year'],
                                $query_row['long_description'],
                                $query_row['Image_file']);
      

            //set the id for the wine
            $wine->setId($query_row["id"]);

            return $wine;
        }

        return false;
    }

    //search the database for wines that match words in name. Return an array of wines if succeed; false otherwise.
    public function search_wine($title) {
        //select statement
        $sql = "SELECT * FROM " . $this->db->getWineTable() . " WHERE name LIKE '%" . $name . "%'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false. 
        if (!$query)
            return false;

        //search succeeded, but no wine was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 wine found.
        //create an array to store all the returned wine.
        $wines = array();

        //loop through all rows
        while ($query_row = $query->fetch_assoc()) {

            //create a wine object
            $wine = new Wine($query_row['name'],
                                $query_row['short_description'],
                                $query_row['price_750ml'],
                                $query_row['year'],
                                $query_row['long_description'],
                                $query_row['image_file']);
                            

            //set the id for the wine
            $wine->setId($query_row["id"]);
            //add the wine into the array
            $wines[] = $wine;
        }
        return $wines;
    }
    
    //update a wine in the database. Details of the wine are posted in a form. Return true if succeed; false otherwise.
    public function update_wine($id) {
        //retrieve wine details

        $name = isset($_POST['name']) && ($_POST['name'] != "") ? $_POST['name'] : null;
        $short_description = isset($_POST['short_description']) && ($_POST['short_description'] != "") ? $_POST['short_description'] : null;
        $price_750ml = isset($_POST['price_750ml']) && ($_POST['price_750ml'] != "") ? $_POST['price_750ml'] : null;
        $year = isset($_POST['year']) && ($_POST['year'] != "") ? $_POST['year'] : null;
        $long_description = isset($_POST['long_description']) && ($_POST['long_description'] != "") ? $_POST['long_description'] : null;
        $Image_file = isset($_POST['Image_file']) && ($_POST['Image_file'] != "") ? $_POST['Image_file'] : null;
    

        //make sure none of them is null
        if ($name && $short_description && $price_750ml && $year && $Image_file) {
            //query string for update 
            $sql = "UPDATE " . $this->db->getWineTable() .
                    " SET name='$name', short_description='$short_description', price_750ml='$price_750ml', long_description='$long_description', Image_file='$Image_file' WHERE id='$id'";

            //execute the query
            return $this->dbConnection->query($sql);
        }
        return false;
    }
}