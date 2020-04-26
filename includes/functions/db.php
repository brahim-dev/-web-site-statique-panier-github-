<?php
class database{
    
 private   $bd;
  function  __construct(){
        try {
            $this->bd = new PDO("mysql:host=localhost;dbname=ecomerce", "root", "");
            // set the PDO error mode to exception
            //$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
    }
    public function getDb() {
        if ($this->bd instanceof PDO) {
             return $this->bd;
        }
  }

}

?>