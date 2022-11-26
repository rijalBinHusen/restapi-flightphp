<?php

require('vendor/autoload.php');
require('controller/Greeting.php');
require('model/dotenv.php');


$getEnv = new getEnv();
Flight::route('GET /env', array($getEnv, 'result'));

// greeting route
$greeting = new Greeting();
Flight::route('GET /greeting', array($greeting, 'hello'));
// named parameter
Flight::route('GET /greeting/@name/@id', array($greeting, 'hello2'));

// greeting route

// root route
Flight::route('GET /', function(){
    echo 'I received a GET request.';
});

Flight::route('POST /', function(){
    echo 'I received a POST request.';
});

Flight::route('PUT /', function(){
    echo 'I received a PUT request.';
});

Flight::route('DELETE /', function(){
    echo 'I received a DELETE request.';
});
// root route

Flight::start();
?>