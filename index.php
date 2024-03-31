<?php
header('Access-Control-Allow-Origin:*'); // * represents allowing requests from any website
header('Access-Control-Allow-Headers:*'); // Allowable request types
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE, PUT'); // Allowable request methods
header('Access-Control-Allow-Credentials:true'); // Set whether sending cookies is allowed

require __DIR__ . "/inc/bootstrap.php";

// header("derp")
// exit()

// echo "Hello world";

// echo($_SERVER['REQUEST_URI'], PHP_URL_PATH)

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// echo($uri)

// CORS headers

$uri = explode( '/', $uri );

// echo("DERP");

if ((isset($uri[3]) && $uri[3] != 'skewl') || !isset($uri[4])) {



    header("HTTP/1.1 404 Not Found");

    exit();

}

// echo("DERP");



require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";

$objFeedController = new UserController();

$strMethodName = $uri[4] . 'Action';

$objFeedController->{$strMethodName}();


?>
