<?php
class db{
protected $connection;

function setconnection(){
    try{
        $this->connection=new PDO("mysql:host=localhost;dbname=books_management_system","root","");
        //echo "Connection Established!";

    }catch(PDOException $e){
        echo "Error";

    }

}


}