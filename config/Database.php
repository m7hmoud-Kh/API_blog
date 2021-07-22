
<?php


class Database
{

    private $host = "localhost";
    private $db_name = "api_blog";
    private $name = "root";
    private $password = '';
    private $conn;
    public function connect()
    {
        $this->conn = NULL;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->name, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "the error of connection " . $e->getMessage();
        }
        return $this->conn;
    }
}
