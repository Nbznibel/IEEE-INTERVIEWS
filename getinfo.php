<?php
session_start();
include 'baseconnect.php';
if (! (empty($_GET['id']))) {
  

 try{
      $sqloffferid=$_GET['id'];
      $sql="SELECT * FROM  interviewees  WHERE ID=?";
      $stmt = $con->prepare($sql);
      $stmt->execute([$sqloffferid]);
      $tab=new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) ;
        foreach($tab as $k=>$v) {
          $info[$k]=$v;
          
        }
        echo json_encode($info);
      
      }
         catch (Exception $e) {
              echo 'prob' . "<br>" . $e->getMessage();}}
  