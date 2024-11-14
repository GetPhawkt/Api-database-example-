
<?php
require 'assets/db/connect.php';
namespace emp; 
class DatabaseAPI {
    private $connection;

    public function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function createTable($tableName, $columns) {
        $sql = "CREATE TABLE $tableName ($columns)";
        return $this->connection->query($sql);
    }

    public function setPrimaryKey($tableName, $columnName) {
        $sql = "ALTER TABLE $tableName ADD PRIMARY KEY ($columnName)";
        return $this->connection->query($sql);
    }

    public function deleteTable($tableName) {
        $sql = "DROP TABLE $tableName";
        return $this->connection->query($sql);
    }

    public function deleteColumn($tableName, $columnName) {
        $sql = "ALTER TABLE $tableName DROP COLUMN $columnName";
        return $this->connection->query($sql);
    }

    public function alterTable($tableName, $alteration) {
        $sql = "ALTER TABLE $tableName $alteration";
        return $this->connection->query($sql);
    }

    public function readTable($tableName) {
        $sql = "SELECT * FROM $tableName";
        return $this->connection->query($sql);
    }

    public function insertIntoTable($tableName, $columns, $values) {
        $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
        return $this->connection->query($sql);
    }

    public function makeQuery($query) {
        return $this->connection->query($query);
    }

    public function __destruct() {
        $this->connection->close();
    }
}
?>
