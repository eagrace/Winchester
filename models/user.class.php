<?php
/**
 * Representation of a user.
 *
 * Author: Liz, tyler, zizi
 */
class User {
    private $id, $first_name, $last_name, $user_name, $password, $role;
    
    public function __construct($first_name, $last_name, $user_name, $password, $role) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->role = $role;
    }
    
    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function setId() {
        return $this->id;
    }
    
    public function setRole()   {
        return $this->role;
    }


}

?>
