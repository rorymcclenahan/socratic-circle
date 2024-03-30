<?php

class UserController extends BaseController

{

    /**

* "/user/list" Endpoint - Get list of users

*/

    public function listAction()

    {
        $strErrorDesc = '';

        $requestMethod = $_SERVER["REQUEST_METHOD"];
        // echo $_SERVER['QUERY_STRING'];


        // getQueryStringParams($_SERVER['QUERY_STRING'], $arrQueryStringParams);
        $arrQueryStringParams = $this->getQueryStringParams();
        // echo $arrQueryStringParams . "Fart";
        if(!is_array($arrQueryStringParams)) {
            // echo "REEEEEEEEEEEEEE";
            // echo $arrQueryStringParams['limit'];
        }

        if (strtoupper($requestMethod) == 'GET') {

            try {

                $userModel = new UserModel();

                $intLimit = 100;
                // echo"aaa\n";
                // echo $_GET['limit'];
                // echo"bbb\n";



                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {

                    $intLimit = $arrQueryStringParams['limit'];
                    // echo $intlimit;
                    // echo "FKDJF:SDKJFL";

                }
                // echo"a\n";
                // echo $intlimit;
                // echo "LIKE HOW, TELL ME HOW";
                $arrUsers = $userModel->getRatings($intLimit);

                $responseData = json_encode($arrUsers);

            } catch (Error $e) {

                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';

                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';

            }

        } 
        // elseif (strtoupper($requestMethod) == 'POST') 
        else {

            $strErrorDesc = 'Method not supported';

            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';

        }



        // send output





        if (!$strErrorDesc) {

            $this->sendOutput(

                $responseData,

                array('Content-Type: application/json', 'HTTP/1.1 200 OK')

            );

        } else {

            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 

                array('Content-Type: application/json', $strErrorHeader)

            );

        }

    }

    public function loginAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if(isset($_GET['username'])) {
            $leusername = $_GET['username'];
            $lepassword = $_GET['password'];
            $userModel = new UserModel();
            if (strtoupper($requestMethod) == 'GET') {
                try {
                    $arrUsers = $userModel->loginUsername($leusername, $lepassword);
                    $responseData = json_encode($arrUsers);
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            } 
        }
        else {
        $leemail = $_GET['email'];
        $lepassword = $_GET['password'];
        $userModel = new UserModel();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $arrUsers = $userModel->loginEmail($leemail, $lepassword);
                $responseData = json_encode($arrUsers);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } 
    }

    
    }
    public function addAction()
    {
        // echo "surely we're here";
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $leusername = $_GET['username'];
        $lesong = $_GET['song'];
        $leartist = $_GET['artist'];
        $lerating = $_GET['rating'];

        $userModel = new UserModel();
        if (strtoupper($requestMethod) == 'POST') {
    
            try {

                $arrUsers = $userModel->addSong($leusername, $lesong, $leartist, $lerating);
                $responseData = json_encode($arrUsers);
                echo "safe in controller";
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } 
    }

    // Function at 'the start of the chain' for deleting a review!
    // It takes data from the axios http request and puts parts of that data into nice usable states for 'UserModel.php' to operate on!
    public function deleteAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $leusername = $_GET['username'];
        $lesong = $_GET['song'];
        $leartist = $_GET['artist'];
        echo "I'm here";

        $userModel = new UserModel();
        if (strtoupper($requestMethod) == 'DELETE') {

            try {
        

                $userModel->deleteSong($leusername, $lesong, $leartist);
                $intLimit = 10;
                $arrUsers = $userModel->getRatings($intLimit);
                $responseData = json_encode($arrUsers);
                // echo "safe in controller";
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } 
    }

    // Function at 'the start of the chain' for editing a review!
    // It takes data from the axios http request and puts parts of that data into nice usable states for 'UserModel.php' to operate on!
    public function editAction()
    {
            
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];
            $out_value = "";
            $id = $_GET['id'];
            $username = $_GET['username'];
            $artist = $_GET['artist'];
            $song = $_GET['song'];
            $rating = $_GET['rating'];
            echo "I'm here";
            $userModel = new UserModel();
            if (strtoupper($requestMethod) == 'PUT') {
            try {
                echo "test UC 1";
                $arrUsers = $userModel->editRatingPASS($id, $username, $artist, $song, $rating);
                echo "test UC 2";
                $responseData = json_encode($arrUsers);
                echo "safe in controller";
                // all the code as needed for editAction
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } 
    }

    public function signupAction() {
        try {

            echo("yo we in signupaction");
            // return "yo waht's goodie slime";
            
            $requestMethod = $_SERVER["REQUEST_METHOD"];
            $userModel = new UserModel();
            $leusername = $_GET['username'];
            $lepassword = $_GET['password'];
            $leemail = $_GET['email'];


   
            // $intLimit = 10;

        } catch (Error $e) {
            $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        }
        $answer = $userModel->createUsers($leusername, $lepassword, $leemail);
        if (gettype($answer) == gettype("string")){
            echo "username is taken";
            return "username is taken";
        }
        else{
        $responseData = json_encode($answer);
        }
 

    }


    //LOOK HERE DUMMY!!!! 
    //if (isset($_REQUEST["submit"])) {
    //     $out_value = "";
    //     $id = $_REQUEST['id'];
    //     $username = $_REQUEST['username'];
    //     $artist = $_REQUEST['artist'];
    //     $song = $_REQUEST['song'];
    //     $rating = $_REQUEST['rating'];
    // // unimplemented

}
