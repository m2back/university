<?php
session_start();
if (isset($_SESSION['masterId'])) {
$code=$_SESSION['masterId'];
include_once ('connectdb.php');
include_once ('pageheader.php');
$stmt=$connection->prepare("SELECT * FROM tbl_spc_mstr WHERE mstr_id = :code");
$stmt->bindParam(':code',$code);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$mstr_spc=$stmt->fetch();
?>

  <body>
    <?php include_once ('navigationbar.php'); ?>
    <?php include_once ('sidenavmaster.php'); ?>
    <div class="main">

    </div>
    <div class="container wlcmMsg">


      <div class="row ">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-11">
          <div class="wlcmMsgtxt  alert alert-primary">
            <span>کاربر گرامی</span>
            <span class="text-danger">
        <?php
            echo $mstr_spc['fname'];
            echo "   ";
            echo $mstr_spc['lname'];
        ?>
    </span>
            <span>خوش آمدید</span>
          </div>
        </div>
      </div><br>
    </div>

    <form method="post" action="sendquerymasterspc.php" class="sendDetail">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-5" style="text-align:center">
            <h2>ویرایش مشخصات</h2><br>
          </div>
        </div>
        <div class="result">

        </div>
        <div class="row">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-8">
            <table class="editDetails table-striped table-bordered table-hover table-dark">
              <tr>
                <td>
                  نام:
                </td>
                <td>
                  <input type="text" name="fname" class="form-control" id="usr" value="<?php echo $mstr_spc['fname']; ?>">
                </td>
              </tr>
              <tr>
                <td>
                  نام خانوادگی:
                </td>
                <td>
                  <input type="text" name="lname" class="form-control" id="usr" value="<?php echo $mstr_spc['lname']; ?>">
                </td>
              </tr>
              </tr>
              <tr>
                <td>
                  نام پدر:
                </td>

                <td>
                  <input type="text" name="father_name" class="form-control" id="usr" value="<?php echo $mstr_spc['father_name']; ?>">
                </td>
              </tr>
              <tr>
                <td>
                  کد ملی:
                </td>
                <td>
                  <input type="text" name="national_code" class="form-control" id="usr" value="<?php echo $mstr_spc['national_code']; ?>">
                </td>
              </tr>
              <tr>
                <td>
                  شماره پرسنلی:
                </td>
                <td>
                  <input type="text" name="prsnl_id" class="form-control" id="usr" value="<?php echo $mstr_spc['prsnl_id']; ?>">
                </td>
                <tr>
                  <td>
                    تاریخ تولد:
                  </td>
                  <td>
                    <input type="text" name="birthday" class="form-control" id="usr" value="<?php echo $mstr_spc['birthday']; ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    جنسیت:
                  </td>
                  <td>
                    <select name="sex" class="form-control" id="sel1">
                  <option value="1" selected>مرد</option>
                  <option value="2" >زن</option>
                  <option value="3" >دیگر</option>
                </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    رشته تحصیلی:
                  </td>
                  <td>
                    <input type="text" name="major" class="form-control" id="usr" value="<?php echo $mstr_spc['major']; ?>">
                  </td>
                </tr>
              </tr>
              <tr>
                <td>
                  مدرک تحصیلی:
                </td>
                <td>
                  <input type="text" name="evidence" class="form-control" id="usr" value="<?php echo $mstr_spc['evidence']; ?>">
                </td>
              </tr>
            </table><br>
          </div>
        </div>
        <div class="row btnsrow">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-4">
            <button type="submit" name="submitDetailData" class="btn btn-secondary submitDetailData">ثبت اطلاعات</button>
            <button type="reset" name="resetDetailData" class="btn btn-secondary resetDetailData">پاک کردن</button>

          </div>
        </div>
      </div>
    </form>

  </body>

  </html>
  <?php
      }else{
        header('Location:loginpage.php?msg=notlogedin');
        exit();
      }
    ?>