<?php
class DB{
    function __construct(){
        $this->pdo = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, 
        DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
          ]);

    }
     //Metodo query
     function select ($sql, $data=null) {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
        return $this->stmt->fetchAll();
      }

      //Metodo insert
      function insert($sql, $data=null) {
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute($data);
      }
      function update($sql, $data = null) {
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute($data);
    }

    function delete($sql, $data = null) {
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute($data);
    }


} 

//Database settings
define("DB_HOST", "localhost");
define("DB_NAME", "test");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "sharito123456789");
$_DB = new DB();




?>