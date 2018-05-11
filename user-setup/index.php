<?php
  include '../config.php';
  if($ck==1)
  {
    header("Location: ../cpanel/");
  }
  else {
    header("Location: ../login/");
  }
?>
