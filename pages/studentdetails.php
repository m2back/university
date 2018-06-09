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
                    <div class="wlcmMsgtxt  alert alert-primary">
                        <span>کاربر گرامی</span>
                        <span class="text-danger">
          <?php
              echo $stdnt_spc['fname'];
              echo "   ";
              echo $stdnt_spc['lname'];
          ?>
        </span>
                        <span>خوش آمدید</span>
                    </div>
                </div>
            </div><br>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4" style="text-align:center">
                    <h2>مشخصات</h2><br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-8">
                    <table class="editDetails table-striped table-bordered table-hover table-dark">
                        <form method="post" action="sendqueryspc.php">
                            <tr>
                                <td>
                                    نام:
                                </td>
                                <td>
                                    <span><?php echo $stdnt_spc['fname']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    نام خانوادگی:
                                </td>
                                <td>
                                    <span><?php echo $stdnt_spc['lname']; ?></span>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>
                                    نام پدر:
                                </td>
                                <td>
                                    <span><?php echo $stdnt_spc['father_name']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    کد ملی:
                                </td>
                                <td>
                                    <span><?php echo $stdnt_spc['national_code']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    شماره دانشجویی:
                                </td>
                                <td>
                                    <span><?php echo $stdnt_spc['uni_id']; ?></span>
                                </td>
                                <tr>
                                    <td>
                                        تاریخ تولد:
                                    </td>
                                    <td>
                                        <span><?php echo $stdnt_spc['birthday']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        جنسیت:
                                    </td>
                                    <td>
                                        <span>
                  <?php
                          if ($stdnt_spc['sex'] = 1){echo "مرد";}
                          elseif ($stdnt_spc['sex'] = 2) {echo "زن";}
                          elseif ($stdnt_spc['sex'] = 3){echo "دیگر";}
                          ?>
                        </span>
                                    </td>
                                    <tr>
                                    <td>
                                        نوع نظام آموزشی:
                                    </td>
                                    <td>
                                        <span>
                  						<?php
                          if ($stdnt_spc['edutype'] = 1){echo "روزانه";}
                          elseif ($stdnt_spc['edutype'] = 2) {echo "شبانه";}
                        				  ?>
                       					 </span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        رشته تحصیلی:
                                    </td>
                                    <td>
                                        <span><?php echo $stdnt_spc['major']; ?></span>
                                    </td>
                                </tr>
                            </tr>
                            <tr>
                                <td>
                                    مدرک تحصیلی:
                                </td>
                                <td>
                                    <span><?php echo $stdnt_spc['evidence']; ?></span>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </body>

    </html>
    <?php

           }else {
             header("Location:./loginpage.php?msg=notlogedin");
             exit();

           }

      ?>