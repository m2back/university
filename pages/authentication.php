<?php
session_start();
$usernameErr="";
$passwordErr="";
$ajaxLoc="";
function sanitize_data($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);

    return $data;}
include_once ("connectdb.php");
if (isset($_POST['submitData'])) {
  if(empty($_POST['username']))
  {
      $usernameErr="نام کاربری را وارد نمائید";
  }
  else{
      $username=sanitize_data($_POST['username']);
  }

  if(empty($_POST['password']))
  {
      $passwordErr="رمز عبور را وارد نمائید";
  }
  else{
      $password=sanitize_data($_POST['password']);
  }
  $stmt=$connection->prepare("SELECT * FROM tbl_users WHERE username=:us AND password=:ps");

  $stmt->bindParam(':us',$username);
  $stmt->bindParam(':ps',$password);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  if ($stmt->rowCount()>0) {
    $row=$stmt->fetch();
    switch($row['type'])
    {
        case 1:
            $_SESSION['masterId']=$row['code'];
            header('Location:masterdetails.php');
            $ajaxLoc=1;
             break;
        case 2:
             $_SESSION['studentId']=$row['code'];
            header('Location:studentdetails.php');
            $ajaxLoc=2;
            break;
    }
      }
  else{
      header('location:loginpage.php?msg=failed');

  }
}


 ?>