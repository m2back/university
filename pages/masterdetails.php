<?php
 session_start();
 if (isset($_SESSION['masterId'])) {
  $code=$_SESSION['masterId'];
  include_once ('connectdb.php');
  include_once ('pageheader.php');
  $stmt=$connection->prepare("SELECT * FROM tbl_spc_mstr WHERE mstr_id=:code");
  $stmt->bindParam(':code',$code);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $mstr_spc=$stmt->fetch();
     ?>

    <body>
        <?php include_once ('navigationbar.php'); ?>
        <?php include_once ('sidenavmaster.php'); ?>
        <div class="container wlcmMsg">
            <div class="row ">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-11">
                    <div class="wlcmMsgtxt  alert alert-primary">
                        <span>کاربر گرامی</span>
                        <span  class="text-danger">
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
                                    <span><?php echo $mstr_spc['fname']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    نام خانوادگی:
                                </td>
                                <td>
                                    <span><?php echo $mstr_spc['lname']; ?></span>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>
                                    نام پدر:
                                </td>
                                <td>
                                    <span><?php echo $mstr_spc['father_name']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    کد ملی:
                                </td>
                                <td>
                                    <span><?php echo $mstr_spc['national_code']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    شماره پرسنلی:
                                </td>
                                <td>
                                    <span><?php echo $mstr_spc['prsnl_id']; ?></span>
                                </td>
                                <tr>
                                    <td>
                                        تاریخ تولد:
                                    </td>
                                    <td>
                                        <span><?php echo $mstr_spc['birthday']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        جنسیت:
                                    </td>
                                    <td>
                                        <span>
                  <?php
                          if ($mstr_spc['sex'] = 1){echo "مرد";}
                          elseif ($mstr_spc['sex'] = 2) {echo "زن";}
                          elseif ($mstr_spc['sex'] = 3){echo "دیگر";}
                          ?>
                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        رشته تحصیلی:
                                    </td>
                                    <td>
                                        <span><?php echo $mstr_spc['major']; ?></span>
                                    </td>
                                </tr>
                            </tr>
                            <tr>
                                <td>
                                    مدرک تحصیلی:
                                </td>
                                <td>
                                    <span><?php echo $mstr_spc['evidence']; ?></span>
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