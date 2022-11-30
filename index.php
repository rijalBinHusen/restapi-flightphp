<?php

require_once('vendor/autoload.php');
require_once('controller/Greeting.php');
require_once('model/database.php');
require_once('controller/Articles.php');
require_once('controller/MyGuest.php');

// Myguests
$guests = new MyGuest();
Flight::route('GET /myguests', array($guests, 'getMyGuests'));
Flight::route('POST /myguests', array($guests, 'addMyGuest'));
Flight::route('DELETE /myguests/@id', array($guests, 'deleteGuest'));
Flight::route('GET /myguests/@id', array($guests, 'getGuestById'));
Flight::route('PUT /myguests/@id', array($guests, 'updateGuestById'));

// Articles
$articles = new Articles();
Flight::route('GET /articles', array($articles, 'getArticles'));

// check the database connection status
$database = new sqldatabase();
Flight::route('GET /database', array($database, 'status'));


// greeting route
$greeting = new Greeting();
Flight::route('GET /greeting', array($greeting, 'hello'));
// named parameter
Flight::route('GET /greeting/@name/@id', array($greeting, 'hello2'));

// greeting route

// root route
Flight::route('GET /', function () {
    echo 'I received a GET request.';
});

Flight::route('POST /', function () {
    $req = Flight::request()->query->name;
    echo 'I received a POST request '. $req;
});

Flight::route('PUT /', function () {
    echo 'I received a PUT request.';
});

Flight::route('DELETE /', function () {
    echo 'I received a DELETE request.';
});
// root route

Flight::start();
