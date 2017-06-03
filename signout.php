<?php
session_start();
unset($_SESSION['SN_USER']);
session_destroy();
header("location:index.php");
?>