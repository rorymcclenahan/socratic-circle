<?php
header('Access-Control-Allow-Origin:*'); // * represents allowing requests from any website
header('Access-Control-Allow-Headers:*'); // Allowable request types
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE, PUT'); // Allowable request methods
header('Access-Control-Allow-Credentials:true'); // Set whether sending cookies is allowed

class BaseController

{

    /**

* __call magic method.

*/

    public function __call($name, $arguments)

    {

        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));

    }

    /**

* Get URI elements.

*

* @return array

*/

    protected function getUriSegments()

    {

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $uri = explode( '/', $uri );

        return $uri;

    }

    /**
     * 
* Get querystring params.

*

* @return array

*/

    protected function getQueryStringParams()

    {

        return parse_str($_SERVER['QUERY_STRING'], $query);
        
    }

    /**

* Send API output.

*

* @param mixed $data

* @param string $httpHeader

*/

    protected function sendOutput($data, $httpHeaders=array())

    {

        header_remove('Set-Cookie');

        if (is_array($httpHeaders) && count($httpHeaders)) {

            foreach ($httpHeaders as $httpHeader) {

                header($httpHeader);

            }

        }

        echo $data;

        exit;

    }

}
