<?php

session_start();
include 'baseconnect.php';
try {
     $sql="SELECT * FROM interviewees ";
     $stmt = $con->prepare($sql);
     $stmt->execute();
     $result=$stmt->fetchAll();
   
     echo json_encode(['error' =>false,'data'=>$result],JSON_UNESCAPED_UNICODE);


} catch (Exception $e) {
    echo $e->getMessage();
}

?>