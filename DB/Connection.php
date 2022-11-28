<?php
/**
 * Description of Connection
 */
class Connection {
    
    public static function GetConnection(){
   try
    {
        $connect=new PDO("mysql:host=localhost;dbname=virtual_learner","root","");
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch (Exception $ex){
       throw $ex; 
    }
        return $connect;
                
    }
    
    }

?>
