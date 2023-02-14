<?php
namespace reza\karim;
class database{
   public function dbConnection(){
    $hostNAME='localhost';
    $userName='root';
    $password='';
    $databseName='php_oop_crud';

    $connection=mysqli_connect($hostNAME,$userName,$password,$databseName);

    return  $connection;
   }
} 