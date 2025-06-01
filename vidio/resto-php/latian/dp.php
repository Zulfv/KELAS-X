<?php

class DB{

    //  properti
  public $host = "127.0.0.1";
  private $user = "root";
  private $password = "";
  private $database = "db-restoran";

  public function  __construct()
  {
    echo " function construct";
  }
   
//method
 public function selectData()
 {
     echo 'select data ';
 }

public function getDatabase() 
{
    echo $this->database;
}


public function tampil() 

{
    $this->selectData();
}

public static function insertData() 
{
   echo "static function" ;
}

}

 DB::insertData();

 $db = new DB;

// echo '<br>';

// $db -> selectData();
 
// echo '<br>';

//  echo $db->host;

//  echo '<br>';

//  echo $db->getDatabase().'<br>';

//  $db->tampil();

?>