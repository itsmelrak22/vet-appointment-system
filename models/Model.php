<?php

class Model 
{
    protected $table;
    protected $host = "localhost";
    protected $database = "veterinary_appointments";
    protected $username = "root";
    protected $password = "admin";

    protected $stageHost = "localhost";
    protected $stageDatabase = "u394975406_veterinary_app";
    protected $stageUsername = "u394975406_clvc2023";
    protected $stagePassword = "Clvc2023";

    protected $pdo;
    protected $stmt;
    protected $qry;

    public function __construct(){
        // $this->connect();

        $this->connectToStage();
    }

    public function connect(){
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database};charset=utf8","{$this->username}","{$this->password}");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function connectToStage(){
        try {
            $this->pdo = new PDO("mysql:host={$this->stageHost};dbname={$this->stageDatabase};charset=utf8","{$this->stageUsername}","{$this->stagePassword}");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setTable($table){
        $this->table = $table;
        return $this ; //> for method chaining.
    }

    public function setQuery($qry){
        $this->qry = $qry;
        $this->stmt = $this->pdo->query($this->qry);
        return $this;
    }

    public function getAll(){
        try {
            return $this->stmt->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getFirst(){
        try {
            $data =  $this->stmt->fetch();
            return (object) $data; // convert to object
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // Queries
    public function all(){
        $this->qry = "SELECT * FROM $this->table";
        $this->stmt = $this->pdo->query($this->qry);
        $data =  $this->getAll();
        return $data;
    }

    public function allWithOutTrash(){
        $this->qry = "SELECT * FROM $this->table WHERE `deleted_at` IS NULL";
        $this->stmt = $this->pdo->query($this->qry);
        $data =  $this->getAll();
        return $data;
    }

    public function find($primaryKey){
        $data = $this->setQuery("SELECT * FROM $this->table WHERE id = $primaryKey")->getFirst();
        return  $data; 
    }

    public function getLastInsertedId(){
        $data = $this->setQuery("SELECT LAST_INSERT_ID() as id")->getFirst();
        return (int) $data->id;
    }
}
