<?php
session_start();
include_once ('pageheader.php');
?>
<body>
  <?php include_once ('navigationbar.php'); ?>
  <?php include_once ('sidenavbasic.php'); ?>
<form  action="authentication.php" method="post">
  <header class="intro">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h2>ورود به ناحیه کاربری</h2><br><br>
              </div>

            </div>
              <div class="row">
                  <div class="col-lg-12">
                      <ul class="list-inline">
                          <div class="row">
                              <div class="col-sm-3">
                                  <li class="list-inline-item">
                                    <p>نام کاربری:</p>
                                  </li>
                              </div>
                              <div class="col-sm-3">
                                  <li class="list-inline-item">
                                    <input type="text" class="form-control" name="username" placeholder="نام کاربری" required>
                                  </li>
                              </div>
                              <div class="col-sm-3">
                                  <li class="list-inline-item">
                                    <p>رمز عبور:</p>
                                  </li>
                              </div>
                              <div class="col-sm-3">
                                  <li class="list-inline-item">
                                    <input type="password" class="form-control" name="password" placeholder="رمز عبور" required>
                                  </li>
                              </div>
                          </div>
                      </ul><br><br>
                  </div>
              </div>
                  <ul class="list-inline">
                    <div class="row">
                    <div class="col-sm-12">
                      <li class="list-inline-item">
                        <button type="submit" name="submitData" class="btn btn-dark">ورود</button>
                        </li>

                      <li class="list-inline-item">
                        <button type="reset" name="clearData" class="btn btn-dark">پاک کردن</button>
                      </li>
                      <li class="list-inline-item">
                        <button type="button" name="forgotPass" class="btn btn-dark">فراموشی رمز عبور</button>
                      </li>
                    </div>
                    </div>
                  </ul>
                  <br><br>
                  <div class="row">
                    <div class="col-sm-12 loginfailed">
                      <?php
                        if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                        echo '<span class="alert alert-danger">!نام کاربری یا رمز عبور اشتباه است</span>';
                      }elseif (isset($_GET["msg"]) && $_GET["msg"] == 'logut_succefully') {
                        echo '<span class="alert alert-danger">با موفقیت خارج شدید</span>';
                      }elseif (isset($_GET["msg"]) && $_GET["msg"] == 'notlogedin') {
                        echo '<span class="alert alert-danger">شما وارد نشدید لطفا وارد شوید</span>';
                      }
                       ?>

                    </div>
                  </div>
          </div>
    </header>
</form>
</body>
</html>
