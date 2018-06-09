<?php 
session_start();
if (isset($_SESSION['masterId'])) {
	include_once('connectdb.php');
	$lsnid=$_GET['lsnid'];
	$pntvl=$_POST['pntvl'];
	$stmt=$connection->prepare("UPDATE tbl_lsn_pnt SET lsn_pnt=:pntvl WHERE lsn_pnt_id=:lsnid");
	$stmt->bindParam(':pntvl',$pntvl);
	$stmt->bindParam(':lsnid',$lsnid);
	$stmt->execute();
	header('Location:editstudentpoint.php?pointid='.$lsnid);
	}else{
        header('Location:loginpage.php?msg=notlogedin');
        exit();
      }
 ?>