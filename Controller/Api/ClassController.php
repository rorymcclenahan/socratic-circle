<?php

class ClassController extends BaseController

{

    public function createAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        $postData = file_get_contents('php://input'); 
        $data = json_decode($postData, true); 

        
        if (strtoupper($requestMethod) == 'POST') {
                try {
                     //echo "hope hope?"; 
                    $ClassModel = new ClassModel();
                     echo "1"; 
                    $class = $data['coursename']; 
                    $author = $data['author']; 
                    //echo "and the author is"; 
                    //echo $author; 
                    //echo "2"; 
                    // $class = $_GET['coursename'];
                    // echo "djsfl;jdsfklj";
                    // echo $class; 
                    // echo "heyo \n";
                    $response = $ClassModel->createClass($class, $author);
                     //echo "3"; 
                    $responseData = json_encode($response);
                     //echo "bottom of controller try /n"; 
                } catch (Error $e) {
                     //echo "error /n"; 
                    $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            }
            //echo "bottom of controller overall /n";  
        }

    
        public function addAction()
        {
            //echo "surely we're here";
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];
            $postData = file_get_contents('php://input'); 
            $data = json_decode($postData, true); 
            //echo "i hope we're here"; 
    
            if (strtoupper($requestMethod) == 'POST') {
                try {
                    // echo "hope hope?"; 
                    $ClassModel = new ClassModel();
                    // echo "1"; 
                     $student = $data['username'];
                    // echo $student; 
    
                     $author = $data['author'];
                    // echo $author; 
    
                     $coursename = $data['coursename'];
                    // echo $coursename; 
    
                    $response = $ClassModel->addClass($student, $author, $coursename);
                    // echo "3"; 
                    $responseData = json_encode($response);
                    // echo "bottom of controller try /n"; 
                } catch (Error $e) {
                     //echo "error /n"; 
                    $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            }
            //echo "bottom of controller overall /n";  
        }
            } 