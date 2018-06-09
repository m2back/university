<?php
 session_start();
 if (isset($_SESSION['studentId'])) {
  $code=$_SESSION['studentId'];
  include_once('pageheader.php');
  include_once('connectdb.php');
  	$stmt=$connection->prepare("SELECT * FROM tbl_spc_stdnt WHERE stdnt_id=:code");
	$stmt->bindParam(':code',$code);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stdnt_spc=$stmt->fetch();
?>

    <body>
        <?php include_once('navigationbar.php'); ?>
        <?php include_once('sidenavstudent.php'); ?>
        <div class="main">
        </div>
        <div class="container wlcmMsg">
            <div class="row ">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-11">
                    <div class="wlcmMsgtxt alert alert-primary">
                        <span>ویرایش مشخصات:</span>
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

      <form method="post" action="sendquerystudentspc.php" class="sendDetail">
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
                  <input type="text" name="fname" class="form-control" id="usr" value="<?php echo $stdnt_spc['fname']; ?>">
                </td>
              </tr>
              <tr>
                <td>
                  نام خانوادگی:
                </td>
                <td>
                  <input type="text" name="lname" class="form-control" id="usr" value="<?php echo $stdnt_spc['lname']; ?>">
                </td>
              </tr>
              </tr>
              <tr>
                <td>
                  نام پدر:
                </td>

                <td>
                  <input type="text" name="father_name" class="form-control" id="usr" value="<?php echo $stdnt_spc['father_name']; ?>">
                </td>
              </tr>
              <tr>
                <td>
                  کد ملی:
                </td>
                <td>
                  <input type="text" name="national_code" class="form-control" id="usr" value="<?php echo $stdnt_spc['national_code']; ?>">
                </td>
              </tr>
              <tr>
                <td>
                  شماره دانشجویی:
                </td>
                <td>
                  <input type="text" name="uni_id" class="form-control" id="usr" value="<?php echo $stdnt_spc['uni_id']; ?>">
                </td>
                <tr>
                  <td>
                    تاریخ تولد:
                  </td>
                  <td>
                    <input type="text" name="birthday" class="form-control" id="usr" value="<?php echo $stdnt_spc['birthday']; ?>">
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
                    نوع نظام آموزشی:
                  </td>
                  <td>
                    <select name="edutype" class="form-control" id="sel1">
                  <option value="1" selected>روزانه</option>
                  <option value="2" >شبانه</option>
                </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    رشته تحصیلی:
                  </td>
                  <td>
                    <input type="text" name="major" class="form-control" id="usr" value="<?php echo $stdnt_spc['major']; ?>">
                  </td>
                </tr>
              </tr>
              <tr>
                <td>
                  مدرک تحصیلی:
                </td>
                <td>
                  <input type="text" name="evidence" class="form-control" id="usr" value="<?php echo $stdnt_spc['evidence']; ?>">
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
          </div>
        </div>
      </div>
    </form>

    </body>
    </html>
<?php

       }else {
         header("Location:./loginpage.php?=notlogedin");
         exit();

       }

  ?>