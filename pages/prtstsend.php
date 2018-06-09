<?php
session_start();
if (isset($_SESSION['studentId'])) {

	include_once('connectdb.php');
	$prtst=$_GET['prtst'];
	$lsn_id=$_GET['lsnid'];
	$stmt=$connection->prepare("UPDATE tbl_lsn_pnt SET prtst=:prtst WHERE lsn_pnt_id=:lsn_id");
    $stmt->bindParam(':prtst',$prtst);
    $stmt->bindParam(':lsn_id',$lsn_id);
    $stmt->execute();
		header('Location:studentpoints.php');
		 } else{
	 	     header("Location:./loginpage.php?msg=notlogedin");
  		   exit();
		 }
?>