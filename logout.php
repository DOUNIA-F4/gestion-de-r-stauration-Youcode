<?php
include 'Admin/config/db.php';
Session_start();
Session_destroy();
header('Location:index.php');
?>