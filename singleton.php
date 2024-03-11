<?php
 class DatabaseConnetion{
    private $dsn=  "mysql:host=localhost;dbname=teste";
    private  $username = "root";
    private $password = "";
    private $option = [];


    private static $instance = null;


    
    private function __construct(){
       
    }

    public function getInstance(){

      if (self::$instance == null){
        self::$instance = new DatabaseConnetion();
      }
      return self::$instance;
    }

    public function connection(){
        try{
            self::$instance =  new PDO($this->dsn,$this->username,$this->password);
            
        }catch(PDOException $e){
            
        }
    }
    public function querry($querry){
        $stmt = self::$instance;
    }
 
}