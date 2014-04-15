<?php
/**
 * Application model of a user.
 *
 * Author:Liz, tyle, zizi
 */
class UserModel {
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
    
    public function getUsers(){ 
        //SQL select statement
        $sql = "SELECT * FROM " . $this->db->getUsersTable();

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all users
            $users = array();

            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                $user = new User($query_row["first_name"],
                                $query_row["last_name"],
                                $query_row["user_name"],
                                $query_row["password"],
                                $query_row["role"]);
                
                //push the users into the array
                $users[] = $user;
            }
            return $users;
        }
        return false;
    }
    
    public function addUser($user) {
        //SQL select statement
        $sql = "INSERT INTO " . $this->db->getUsersTable() 
                 . " (last_name, first_name, user_name, password) VALUES ("
                . "'" . $guest->getLastName() . "', "
                . "'" . $guest->getFirstName() . "', "
                . "'" . $guest->getUserName() . "', "
                . "'" . $guest->getPassword() . "')";
                
        //execute the query
        $query = $this->dbConnection->query($sql);
        
    }
}

?>

