<?php
session_start();
if (isset($_SESSION['masterId'])) {
  echo "OK";
}else {
  echo "nokey";
}
