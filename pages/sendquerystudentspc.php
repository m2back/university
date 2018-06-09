<?php
session_start();
$code=$_SESSION['studentId'];
include_once ('connectdb.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$father_name=$_POST['father_name'];
$national_code=$_POST['national_code'];
$uni_id=$_POST['uni_id'];
$birthday=$_POST['birthday'];
$sex=$_POST['sex'];
$major=$_POST['major'];
$evidence=$_POST['evidence'];
$edutype=$_POST['edutype'];
$stmt=$connection->prepare("UPDATE tbl_spc_stdnt
                              SET fname = '$fname' , lname = '$lname' , father_name = '$father_name' , national_code = '$national_code' ,
                                  uni_id = '$uni_id' , birthday = '$birthday' , sex = $sex , major = '$major' , evidence = '$evidence' , edutype = 'edutype'
                              WHERE stdnt_id='$code';");
$stmt->execute();
header('Location:studentdetails.php');
?>