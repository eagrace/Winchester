<?php

/*
 * Author: Liz, tyler, Zizi
 * Date: 04/09/2014
 * File: database.php
 * Description: Description: the Database class sets the datbase details.
 * 
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'bblmhcj14',
        'database' => 'beer',
        'tblBeer' => 'beer',
        'tblWine' => 'wine',
        'tblUser' => 'buyeruser'
        
        

    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
                        $this->param['host'],
                        $this->param['login'],
                        $this->param['password'],
                        $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $errno = mysqli_connect_errno();
            $errmsg = mysqli_connect_error();
            die("Connecting database failed: ($errno) $errmsg <br/>\n");
        }
    }

    //static method to ensure there is just one Database instance
    static public function getInstance() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores beers
    public function getBeerTable() {
        return $this->param['tblBeer'];
    }

    //returns the name of the table that stores wines
    public function getWineTable() {
        return $this->param['tblWine'];
    }

    //returns the name of the table storing buyerusers
    public function getUserTable() {
        return $this->param['tblUser'];
    }
    

}

?>
