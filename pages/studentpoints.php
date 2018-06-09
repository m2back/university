<?php
session_start();
  if (isset($_SESSION['studentId'])) {
    $code=$_SESSION['studentId'];
    include_once ('pageheader.php');
    include_once ('connectdb.php');
        $stmt_1=$connection->prepare("SELECT * FROM tbl_spc_stdnt WHERE stdnt_id=:student_id");
        $stmt_1->bindParam(':student_id',$code);
        $stmt_1->execute();
        $stmt_1->setFetchMode(PDO::FETCH_ASSOC);
        $stdnt_spc=$stmt_1->fetch();
        $stmt_5=$connection->prepare("SELECT * FROM tbl_lsn_pnt WHERE stdnt_id=:stdnt_id");
        $stmt_5->bindParam(':stdnt_id',$code);
        $stmt_5->execute();
        $stmt_5->setFetchMode(PDO::FETCH_ASSOC); 
?>

<body>
  <?php include_once('navigationbar.php') ?>
  <?php include_once('sidenavstudent.php') ?>
      <div class="container">
      <div class="row ">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
        <div class="topPageTxt  alert alert-primary">
      <span>مشاهده نمرات:</span>
      <span class="text-danger">
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
                <th>نام درس</th>
                <th>نام استاد</th>
                <th>نمره فعلی </th>
                <th>اعتراض به نمره</th>
              </tr>
            <tbody>
              <?php
              while ($lsn_pnt_spc=$stmt_5->fetch()) {
                echo "<tr><td>";
                $stmt_6=$connection->prepare("SELECT * FROM tbl_lsns WHERE lsn_id=:lsn_id");
                $stmt_6->bindParam(':lsn_id',$lsn_pnt_spc['lsn_id']);
                $stmt_6->execute();
                $stmt_6->setFetchMode(PDO::FETCH_ASSOC);
                $lsn_spc=$stmt_6->fetch();
                $stmt_4=$connection->prepare("SELECT * FROM tbl_spc_mstr WHERE mstr_id=:mstr_id");
                $stmt_4->bindParam(':mstr_id',$lsn_pnt_spc['mstr_id']);
                $stmt_4->execute();
                $stmt_4->setFetchMode(PDO::FETCH_ASSOC);
                $mstr_spc=$stmt_4->fetch();
                echo $lsn_spc["lsn_name"];
                echo "</td><td>";
                echo $mstr_spc["fname"] . "  ". $mstr_spc["lname"];
                echo "</td><td>";
                echo $lsn_pnt_spc['lsn_pnt'];
                echo "</td><td>";
                  if ($lsn_pnt_spc['prtst'] == 1) {
                    echo '✔';
                  }
                  else{echo '<span class="prtstbtn"><a href="prtstsend.php?prtst=1&lsnid='.$lsn_pnt_spc["lsn_pnt_id"].'">❌</a></span>';
                        $mstr_id=$lsn_pnt_spc['mstr_id'];}
                echo "</td></tr>";
              }?>


            </tbody>

          </table>

        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>
    </div>
</body>
</html>
<?php

   }else {
     header("Location:./loginpage.php?=notlogedin");
     exit();

   }

  ?>
  <script type="text/javascript">/*
    $(document).ready(function(){
      var send  = true;
      var studentId = <?php echo $code; ?>
      var mstr_id   = <?php echo $mstr_id; ?>
      var prtst     = "1";
        $(".prtstbtn").click(function(){
          $.post("prtstsend.php",{send:send,stdnt_id:studentId,mstr_id:mstr_id,prtst:prtst},function(data){
            $("result").html(data);
          })
        })
    })*/
  </script>