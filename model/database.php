<?php
// Call dotenv package
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
// load dotenv package
$dotenv->load();

class sqldatabase
{
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
        } catch (PDOException $e) {
            // set value to connection status
            $this->connection_status = "Connection failed: " . $e->getMessage();
        }
    }
    public function getData($columns, $table)
    {
        // the query
        $result = array();
        // we are gonna split string as array, so we can loop it bruh
        $arrOfColumns = explode(", ", $columns);
        // $query = 'SELECT * from myguests';
        $query = $this->conn->query('SELECT ' . $columns . ' from ' . $table);
        while ($row = $query->fetch()) {
            $tempResult = array();
            // iterate the columns
            foreach ($arrOfColumns as $column) {
                // tempResult { tempResult: row }
                $tempResult[$column] = $row[$column];
            }
            // push to result
            array_push($result, $tempResult);
        }
        return $result;
    }
    public function writeData($table, $columns, $values)
    {
        try {
            $sql = "INSERT INTO " . $table . $columns . " VALUES " . $values ." )";
            // use exec() because no results are returned
            $this->conn->exec($sql);
            return "New record created successfully";
        } catch (PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
        }
    }
    public function status()
    {
        // return value when the function called
        echo $this->connection_status;
    }
    function __destruct()
    {
        $this->conn  = null;
    }
}
