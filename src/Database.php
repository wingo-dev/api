<?php
class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Create connection
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        return $result;
    }

    public function close()
    {
        $this->conn->close();
    }
}
