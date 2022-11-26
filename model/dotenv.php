<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..');
$dotenv->load();

class getEnv {
    public function result() {
        $appName = getenv('APP_ENV');
        $database = getenv('DATABASE');
        return Flight::json(array(
            'app name' => $appName,
            'database' => $database, 
        ));
    }
}