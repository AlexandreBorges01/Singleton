<?php
 class DatabaseConnetion{
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
        try{
            self::$instance =  new PDO($this->dsn,$this->username,$this->password);
            
        }catch(PDOException $e){
          echo "Erro de conexão: " . $e->getMessage();
          exit;
        }
    }
    public function query($query){
      $stmt = self::$instance;
      $stmt = $stmt->prepare($query);
      
      $stmt->execute();
      return $stmt->fetchAll();
    }
 
}