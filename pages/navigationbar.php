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
      <li>
      <span>
      <?php
        if (isset($_SESSION['masterId']) OR isset($_SESSION['studentId'])) {
        echo '<li class="nav-item">';
        echo '  <a class="nav-link text-warning" href="logout.php" style="float:left">خروج</a></li>';
        }
        ?>
      </span>
      </li>
    </ul>
  </div>
</nav>
