<?php
session_start();
  if (isset($_SESSION['masterId'])) {
    $code=$_SESSION['masterId'];
    include_once ('connectdb.php');
    include_once ('pageheader.php');
    if (isset($_GET['stnid'])) {
        $point_is_get=$_GET['stnid'];
        $stmt_1=$connection->prepare("SELECT * FROM tbl_spc_stdnt WHERE stdnt_id=:student_id");
        $stmt_1->bindParam(':student_id',$point_is_get);
        $stmt_1->execute();
        $stmt_1->setFetchMode(PDO::FETCH_ASSOC);
        $stdnt_spc=$stmt_1->fetch();
        $stmt_2=$connection->prepare("SELECT * FROM tbl_lsn_pnt WHERE stdnt_id=:stdnt_id");
        $stmt_2->bindParam(':stdnt_id',$point_is_get);
        $stmt_2->execute();
        $stmt_2->setFetchMode(PDO::FETCH_ASSOC);
        $lsn_pnt_spc=$stmt_2->fetch();
        $stmt_3=$connection->prepare("SELECT * FROM tbl_lsns WHERE lsn_id=:lsn_id");
        $stmt_3->bindParam(':lsn_id',$lsn_pnt_spc['lsn_id']);
        $stmt_3->execute();
        $stmt_3->setFetchMode(PDO::FETCH_ASSOC);
        $lsn_spc=$stmt_3->fetch();
        $stmt_5=$connection->prepare("SELECT * FROM tbl_lsn_pnt WHERE stdnt_id=:stdnt_id");
        $stmt_5->bindParam(':stdnt_id',$point_is_get);
        $stmt_5->execute();
        $stmt_5->setFetchMode(PDO::FETCH_ASSOC);
}
?>
<?php include_once('navigationbar.php') ?>
<?php include_once('sidenavmaster.php') ?>
    <div class="container">
      <div class="row ">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
        <div class="topPageTxt  alert alert-primary">
      <span>تمام دروس مربوط به دانشجو :</span>
      <span  class="text-danger">
          <?php
              echo $stdnt_spc['fname'];
              echo "   ";
              echo $stdnt_spc['lname'];
          ?>
    </span>
    </div>
    </div>
    </div><br>
    </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <table class="shwmstprgtbl table table-bordered table-hover table-striped table-dark">
            <thead>
              <tr>
                <th>نام دانشجو</th>
                <th>نام درس</th>
                <th>نام استاد</th>
                <th>نمره فعلی </th>
                <th> ویرایش نمره</th>
              </tr>
            <tbody>
              <?php
              while ($lsn_pnt_spc=$stmt_5->fetch()) {
                echo "<tr><td>";
                echo $stdnt_spc['fname'];
                echo " ".$stdnt_spc['lname'];
                echo "</td><td>";
                $stmt_6=$connection->prepare("SELECT * FROM tbl_lsns WHERE lsn_id=:lsn_id");
                $stmt_6->bindParam(':lsn_id',$lsn_pnt_spc['lsn_id']);
                $stmt_6->execute();
                $stmt_6->setFetchMode(PDO::FETCH_ASSOC);
                $lsn_spc=$stmt_6->fetch();
                echo $lsn_spc["lsn_name"];
                echo "</td><td>";
                $stmt_4=$connection->prepare("SELECT * FROM tbl_spc_mstr WHERE mstr_id=:mstr_id");
                $stmt_4->bindParam(':mstr_id',$lsn_pnt_spc['mstr_id']);
                $stmt_4->execute();
                $stmt_4->setFetchMode(PDO::FETCH_ASSOC);
                $mstr_spc=$stmt_4->fetch();
                echo $mstr_spc["fname"] . "  ". $mstr_spc["lname"];
                echo "</td><td>";
                echo $lsn_pnt_spc['lsn_pnt'];
                echo "</td><td>";
                echo "<a href=./editstudentpoint.php?pointid=".$lsn_pnt_spc['lsn_pnt_id'].">ویرایش نمره</a>";
                echo "</td></tr>";
              }?>


            </tbody>

          </table>

        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>
        </div>
          <?php
        }else{
          header('Location:loginpage.php?msg=notlogedin');
          exit();
        }
         ?>