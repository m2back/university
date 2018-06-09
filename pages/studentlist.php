<?php
  session_start();
    if (isset($_SESSION['masterId'])) {
      $code=$_SESSION['masterId'];
      include_once ('connectdb.php');
      include_once ('pageheader.php');
      $stmt_1=$connection->prepare("SELECT DISTINCT stdnt_id FROM tbl_lsn_pnt WHERE mstr_id = :code order by lsn_pnt_id DESC");
      $stmt_1->bindParam(':code',$code);
      $stmt_1->execute();
      $stmt_1->setFetchMode(PDO::FETCH_ASSOC);
?>
<body>
  <?php include_once ('navigationbar.php'); ?>
  <?php include_once ('sidenavmaster.php'); ?>

  <div class="container">
  <div class="row ">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-11">
    <div class="topPageTxt  alert alert-primary">
     <span>لیست دانشجویان</span>
    </div>
  </div>
  </div><br>
  </div>
      <div class="container">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <table class="shwmstprgtbl table table-bordered table-hover table-striped table-dark">
            <thead>
              <tr>
                  <th>نام دانشجو</th>
              </tr>
            <tbody>
              <?php
                while ($lsn_pnt_spc=$stmt_1->fetch()) {
                  $stmt_2=$connection->prepare("SELECT * FROM tbl_spc_stdnt WHERE stdnt_id =:code");
                  $stmt_2->bindParam(':code',$lsn_pnt_spc['stdnt_id']);
                  $stmt_2->execute();
                  $stmt_2->setFetchMode(PDO::FETCH_ASSOC);
                  $stdnt_spc=$stmt_2->fetch();
                  echo "<tr><td><a href='./studentdetailsfrommaster.php?stnid=".$lsn_pnt_spc['stdnt_id']."'>";
                  echo $stdnt_spc['fname'] ."  ". $stdnt_spc['lname'];
                  echo "</a></td></tr>";
                }
               ?>
            </tbody>
          </table>
        </div>
         <div class="col-sm-2"></div>
    </div>
  </div>
</body>
</html>
  <?php
  }else{
    header('Location:loginpage.php?msg=notlogedin');
    exit();
  }
?>