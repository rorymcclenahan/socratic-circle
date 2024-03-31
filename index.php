<?php
header('Access-Control-Allow-Origin:*'); // * represents allowing requests from any website
header('Access-Control-Allow-Headers:*'); // Allowable request types
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE, PUT'); // Allowable request methods
header('Access-Control-Allow-Credentials:true'); // Set whether sending cookies is allowed

require __DIR__ . "/inc/bootstrap.php";


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// CORS headers

$uri = explode( '/', $uri );

//print("hello");

if ((isset($uri[2]) && $uri[2] != 'class') || !isset($uri[3])) {


   // echo("yo");
    header("HTTP/1.1 404 Not Found");

    exit();

}

//echo("here");

require PROJECT_ROOT_PATH . "/Controller/Api/ClassController.php";
//echo("here2");


$objFeedController = new ClassController();

//echo("appended action");
$strMethodName = $uri[3] . 'Action';

$objFeedController->{$strMethodName}();


?>