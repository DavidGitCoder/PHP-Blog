<?php

namespace Core\Database;

use PDO;

class MySqlDatabase extends Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $db_port;
    private $pdo;

    public function __construct($db_name, $db_host = 'localhost', $db_port = 3306, $db_user = 'root', $db_pass = 'root')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        $this->db_port = $db_port;
    }

    private function createPDO()
    {
        $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . ';port=' . $this->db_port, $this->db_user, $this->db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $pdo;
    }

    public function getPDO()
    {
        if (!isset($this->pdo)) {
            $this->pdo = $this->createPDO();
        }
        return $this->pdo;
    }

    public function query($statement, $class_name=null): array
    {
        $req = $this->getPDO()->query($statement);
        if(is_null($class_name)){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        return $req->fetchAll();;
    }

    public function prepare($statement, $params, $class_name): array
    {
        $req = $this->getPDO()->prepare($statement, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        return $req->execute($params) ? $req->fetchAll() : [];
    }
}