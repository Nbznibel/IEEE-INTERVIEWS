<?php 
session_start();
include 'baseconnect.php';
try {
  if(empty($_GET['id'])) {
  echo 'empty';}
  else{
    $sqlid=$_GET['id'];
     
        $sql="DELETE FROM interviewees where id=? ";
        $stmt = $con->prepare($sql);
        $stmt->execute([$sqlid]);
          }
} catch (Exception $e) {
      echo 'prob' . "<br>" . $e->getMessage();

}
  ?>
  