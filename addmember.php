<?php 
session_start();
include 'baseconnect.php';
try {
    
  if(empty($_POST['name'])|| empty($_POST['email'])|| empty($_POST['phone'])|| empty($_POST['school'])|| empty($_POST['social'])) {
  header('Location:  index.php');}else{
  $sqlname=$_POST['name'];
  $sqlemail=$_POST['email'];
  $sqlephone=$_POST['phone'];
  $sqleschool=$_POST['school'];
  $sqlesocial=$_POST['social'];
  
      $sql="INSERT INTO interviewees (name,email,phone,socials,school) VALUES (?,?,?,?,?)";
      $stmt = $con->prepare($sql);
      $stmt->execute([$sqlname,$sqlemail,$sqlephone,$sqlesocial,$sqleschool]);
      
      }
    

} catch (Exception $e) {
      echo 'prob' . "<br>" . $e->getMessage();

}


  ?>
  