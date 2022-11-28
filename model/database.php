<?php
// Call dotenv package
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..');
// load dotenv package
$dotenv->load();

class sqldatabase {
    // variable for database connection
    public $conn;
    // variable for connection status
    public $connection_status;
    // this function will automatically called when the class called e.g new sqldatbase()
    public function __construct()
    {
        // get database configuration from dotenv file
        $database = getenv('DATABASE');
        // get username database from dotenv file
        $username = getenv('DATABASE_USER');
        // get password database from dotenv file
        $password = getenv('DATABASE_PASSWORD');
        try {
            $this->conn = new PDO($database, $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // set value to connection status
            $this->connection_status = "Connected successfully";
        } catch(PDOException $e) {
            // set value to connection status
            $this->connection_status = "Connection failed: " . $e->getMessage();
        }
    }
    public function getData() {
        // the query
        $result = array();
        // $query = 'SELECT * from myguests';
        $query = $this->conn->query('SELECT * from myguests');
        while($row = $query->fetch()) {
            array_push($result, (object)[
                'id' => "$row[0]", 
                'firstname' => "$row[1]", 
                'lastname' => "$row[2]", 
                'email' => "$row[3]"
            ]);
          }
        return $result; 
    }
    public function status () {
        // return value when the function called
        echo $this->connection_status;
    }
}