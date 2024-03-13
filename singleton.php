<?php
 class DatabaseConnetion{
    private $pdo = null;
    private $dsn=  "mysql:host=localhost;dbname=teste";
    private  $username = "root";
    private $password = "";
    private $option = [];



    private static $instance = null;


    
    private function __construct(){
       
    }

    public static function getInstance(){

      if (self::$instance == null){
        self::$instance = new DatabaseConnetion();
      }
      return self::$instance;
    }

    public function connect(){
      if(!isset($this->pdo)) {
      try{
        $this->pdo =  new PDO($this->dsn,$this->username,$this->password);
            
        }catch(PDOException $e){
          echo "Erro de conexão: " . $e->getMessage();
          exit;
        }
      }
    }

    public function query($query){
      $stmt = $this->pdo->prepare($query);
      
      $stmt->execute();
      return $stmt->fetchAll();
    }
 
}