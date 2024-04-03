<?php
namespace Database;

class Database {
    private $host = "db";
    private $username = "default";
    private $password = "default";
    private $database = "zpt_digital";
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function disconnect() {
        $this->connection->close();
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function setGeneralLog($state) {
        if ($state !== 'on' && $state !== 'off') {
            throw new InvalidArgumentException('Estado inválido para o log geral.');
        }
        $this->connection->setGeneralLog($state);
    }

    public function setSlowLog($state) {
        if ($state !== 'on' && $state !== 'off') {
            throw new InvalidArgumentException('Estado inválido para o log lento.');
        }
        $this->connection->setSlowLog($state);
    }

    public function isClosed() {
        return !$this->connection || $this->connection->connect_error;
    }
}
?>
