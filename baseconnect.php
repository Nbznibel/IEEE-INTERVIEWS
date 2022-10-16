<?php 
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
      parent::__construct($it, self::LEAVES_ONLY);
    }}
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ieeeinterview";
    try {
      $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $con->exec("set names utf8");
      // set the PDO error mode to exception
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // use exec() because no results are returned 

    } catch(PDOException $e) {
        echo 'prob' . "<br>" . $e->getMessage();
      }
  ?>
  