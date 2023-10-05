<?php
namespace core;
use PDO;
use Exception;
class Database {
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password='Pass1!'){

        $dsn = "mysql:".http_build_query($config,"",";");
        try{
        $this->connection = new PDO($dsn, $username,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);}
        catch(Exception $e){
            echo $e;
        }

    }

    public function query($query, $params=[]){
        try{
            $this->statement = $this->connection->prepare($query);
            $this->statement->execute($params);
            return $this;

        }
        catch (Exception $e){
            return $e;
        }
    }
    public function fetch(){

        return $this->statement->fetch();
    }
    public function get(){

        return $this->statement->fetchAll();
    }
    public function findOrFail()
    {
        $result = $this->fetch();

        if (! $result) {
            abort();
        }

        return $result;
    }

}



