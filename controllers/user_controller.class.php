<?php
/**
 * Controller Object for Users
 *
 * Author: Liz, Tyler, zizi
 */
class UserController {
    private $user_model;
    
    public function __construct() {
        $this->user_model = new UserController();
    }
    
    // show new User form
    public function newUser() {
        $newUser = new newUser();
        $newUser->display();
    }
    
    //list the items placed in shopping cart
    public function shoppingcart() {
        $users = $this->user_model->getUsers();
        $show_users = new ShowUser();
        $show_users->display($users);
    }
    
    // show login success
    public function newuser() {
        //validate all required fields are present
        if(empty($_GET['first_name'])
                || empty($_GET['last_name'])
                || empty($_GET['user_name'])
                || empty($_GET['password']))
        {
            $this->error("All fields are required");
        }
        else {
            $first_name = $_GET['first_name'];
            $last_name = $_GET['last_name'];
            $user_name = $_GET['user_name'];
            $password = $_GET['password'];
        
           /* if(!Utilities::checkemail($email)) {
                $this->error("Email is invalid");          
            } elseif (!Utilities::validatedate($birth_date)) {
                $this->error("Birth Date is invalid");
            }*/
           
                $user = new User($first_name, $last_name, $user_name, $password);
                $this->user_model->addUser($user);
                $newuser = new NewUserUser();
                $newuser->display();
            
        }
}
    
    // display error
    public function error($message){
        $error = new Error();
        $error->display($message);
    }
}

?>
