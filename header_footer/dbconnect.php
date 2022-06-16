<?php
// session_start();
class connexionDB
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "menuiz";
    private $conn;

    function __construct($host = null, $database = null, $username = null, $password = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->database = $database;
            $this->username = $username;
            $this->password = $password;
        }
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
        } catch (PDOException $e) {
            echo 'Erreur : Impossible de se connecter à la base de données !';
            die();
        }
    }

    public function query($sql, $data = array())
    {
        $req = $this->conn->prepare($sql);
        $req->execute($data);
        return $req;
    }

    public function insert($sql, $data = array())
    {
        $req = $this->conn->prepare($sql);
        $req->execute($data);
    }
}

$DB = new connexionDB();
