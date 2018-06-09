<?php
session_start();
$code=$_SESSION['masterId'];
include_once ('connectdb.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$father_name=$_POST['father_name'];
$national_code=$_POST['national_code'];
$prsnl_id=$_POST['prsnl_id'];
$birthday=$_POST['birthday'];
$sex=$_POST['sex'];
$major=$_POST['major'];
$evidence=$_POST['evidence'];
$stmt2=$connection->prepare("UPDATE tbl_spc_mstr
                              SET fname = '$fname' , lname = '$lname' , father_name = '$father_name' , national_code = '$national_code' ,
                                  prsnl_id = '$prsnl_id' , birthday = '$birthday' , sex = $sex , major = '$major' , evidence = '$evidence'
                              WHERE mstr_id='$code';");
$stmt2->execute();
header('Location:masterdetails.php');
?>
