<?php
session_start();
session_unset();
session_destroy();
header("Location:./loginpage.php?msg=logut_succefully");
exit();
 ?>
