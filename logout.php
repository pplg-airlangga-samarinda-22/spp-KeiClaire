<?php
session_start();
session_destroy();
header("location:petugas/login.php");
?>