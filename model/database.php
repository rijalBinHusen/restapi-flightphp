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
    public function deleteData ($table, $column, $criteria) {
        try {
            // sql to delete a record
            $sql = "DELETE FROM ". $table. " WHERE ". $column. "=". $criteria;
          
            // use exec() because no results are returned
            $this->conn->exec($sql);
            return "Record deleted successfully";
          } catch(PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
          }
          
    }
    public function findDataByColumnCriteria ($table, $allColumns, $columnToSearch, $criteria) {
        // initiate array
        $result = array();
        // we are gonna split string as array, so we can loop it bruh
        $arrOfColumns = explode(", ", $allColumns);
        try {
            $stmt = $this->conn->prepare("SELECT id, firstname, lastname FROM MyGuests WHERE lastname='Doe'");
            $stmt->execute();
            $query = 'SELECT ' . $allColumns . ' from ' . $table. ' WHERE '. $columnToSearch. "=". $criteria;
            $query = $this->conn->query($query);
            // set the resulting array to associative
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
          catch(PDOException $e) {
            return "Error: " . $e->getMessage();
          }
    }
    public function getData($columns, $table, $totalRow = 10)
    {
        // initiate array
        $result = array();
        // we are gonna split string as array, so we can loop it bruh
        $arrOfColumns = explode(", ", $columns);
        // the query
        $query = 'SELECT ' . $columns . ' from ' . $table. ' LIMIT '. $totalRow;
        $query = $this->conn->query($query);
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
    public function updateDataByCriteria($table, $keyValueToUpdate, $columnCriteria, $criteria) {
        $sql = "UPDATE ". $table. " SET ". $keyValueToUpdate. " WHERE ". $columnCriteria. "=". $criteria;
        //// Prepare statement
        $stmt = $this->conn->prepare($sql);

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        return $stmt->rowCount() . " records UPDATED successfully";
        // return $sql;
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
