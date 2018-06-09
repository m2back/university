<?php
session_start();
if (isset($_SESSION['masterId'])) {
$code=$_SESSION['masterId'];
include_once ('connectdb.php');
include_once ('pageheader.php');
if (isset($_GET['pointid'])) {
  $point_is_get=$_GET['pointid'];
  $stmt_1=$connection->prepare("SELECT * FROM tbl_lsn_pnt WHERE lsn_pnt_id=:pointid");
  $stmt_1->bindParam(':pointid',$point_is_get);
  $stmt_1->execute();
  $stmt_1->setFetchMode(PDO::FETCH_ASSOC);
  $lsn_pnt_spc=$stmt_1->fetch();
}
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
            <span>ویرایش نمره:</span>
            <span  class="text-danger">
               <?php
              $stmt_2=$connection->prepare("SELECT * FROM tbl_spc_stdnt WHERE stdnt_id=:student_id");
              $stmt_2->bindParam(':student_id',$lsn_pnt_spc['stdnt_id']);
              $stmt_2->execute();
              $stmt_2->setFetchMode(PDO::FETCH_ASSOC);
              $stdnt_spc=$stmt_2->fetch();
              echo $stdnt_spc['fname'];
              echo "   ";
              echo $stdnt_spc['lname'];
                 ?>
             </span>
          </div>
        </div>
      </div><br>
      <div class="container">
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <table class="shwmstprgtbl table table-bordered table-hover table-striped table-dark">
              <thead>
                <tr>
                  <th>نام درس </th>
                  <th>نام استاد</th>
                  <th>نمره فعلی </th>
                  <th>ویرایش نمره</th>
                </tr>
                <tbody>
                  <?php
                $stmt_3=$connection->prepare("SELECT * FROM tbl_lsns WHERE lsn_id=:lsn_id");
                $stmt_3->bindParam(':lsn_id',$lsn_pnt_spc['lsn_id']);
                $stmt_3->execute();
                $stmt_3->setFetchMode(PDO::FETCH_ASSOC);
                $lsn_spc=$stmt_3->fetch();
                $stmt_4=$connection->prepare("SELECT * FROM tbl_spc_mstr WHERE mstr_id=:mstr_id");
                $stmt_4->bindParam(':mstr_id',$lsn_pnt_spc['mstr_id']);
                $stmt_4->execute();
                $stmt_4->setFetchMode(PDO::FETCH_ASSOC);
                $mstr_spc=$stmt_4->fetch();
              ?>
                    <?php
              echo "<form action='submitpoint.php?lsnid=".$point_is_get."' method='post'><tr><td>";
              echo $lsn_spc["lsn_name"];
              echo "</td><td>";
              echo $mstr_spc["fname"] . "  ". $mstr_spc["lname"];
              echo "</td><td>";
              echo $lsn_pnt_spc['lsn_pnt'];
              echo "</td><td>";
              echo '<input type="text" class="form-control" name="pntvl" nclass="pntvl" placeholder='.$lsn_pnt_spc['lsn_pnt'].'>';
              echo "</td></tr>";
             ?>
                </tbody>
            </table>
          </div>
        </div>
        <div class="col-sm-2"></div>
        <div class="row">
          <div class="col-sm-12 btnSubmitPoint" ">
            <div><?php echo  "<input type='submit' class='btn btn-dark submitpoint' id='submitpoint' value='ثبت نمره جدید'></form>";?></div>
        </div>
      </div>
    </div>
    </div>
    <?php
      }else{
        header('Location:loginpage.php?msg=notlogedin');
        exit();
      }
    ?>
      <script type="text/javascript">/*
        $(document).ready(function() {
            var lsnid  = <?php $lsn_pnt_spc['lsn_pnt_id']; ?>;
            var pntvl  = $(".pntvl").val();
            $(".submitpoint").submit(function(){
              alert("SHOW");
                $.ajax({url:"submitpoint.php",type:"POST",
                  data:{lsnid:lsnid,pntvl:pntvl},
                  dataType:'json',
                  success:function(response){
                        alert("SHOW");
                   }
                }); 
            });
        });*/
      </script>