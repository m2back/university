<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <title>University</title>
</head>
<body>



  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="../index.php">صفحه اصلی</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">تماس با ما</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">درباره ما</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="sidenav">
    <a href="#">پنل اساتید</a><br>
    <a href="#">پنل دانشجویان</a><br>
    <a href="#">رزرو غدا</a><br>
    <a href="#">راهنما</a><br>
    <a href="#">تماس با ما</a><br>
  </div>

  <form class="" action="master.php" method="post">
    <header class="intro">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <h2>ورود به پنل اساتید</h2><br><br>
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
                                      <input type="text" name="username" placeholder="کد پرسنلی">
                                    </li>
                                </div>
                                <div class="col-sm-3">
                                    <li class="list-inline-item">
                                      <p>رمز عبور:</p>
                                    </li>
                                </div>
                                <div class="col-sm-3">
                                    <li class="list-inline-item">
                                      <input type="text" name="password" placeholder="کد ملی">
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
                          <button type="submit" name="button" class="btn btn-dark" >ورود</button>
                          </li>

                        <li class="list-inline-item">
                          <button type="reset" name="button" class="btn btn-dark">پاک کردن</button>
                        </li>
                        <li class="list-inline-item">
                          <button type="button" name="button" class="btn btn-dark">فراموشی رمز عبور</button>
                        </li>
                      </div>
                      </div>
                    </ul>
            </div>
      </header>
    </form>
</body>
</html>
