<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";
header('Access-Control-Allow-Origin:*'); // * represents allowing requests from any website
header('Access-Control-Allow-Headers:*'); // Allowable request types
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE, PUT'); // Allowable request methods
header('Access-Control-Allow-Credentials:true'); // Set whether sending cookies is allowed

class ClassModel extends Database

{

    public function createClass($coursename, $author){
        #echo "below coursename \n";
        #echo $coursename;
        #echo "above \n";
        return $this->classCreate($coursename, $author); 
    }

     public function addClass($username, $author, $coursename){
         return $this->classAdd($username, $author, $coursename); 
     }
}