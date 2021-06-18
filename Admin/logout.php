<?php
include 'config/db.php'; 

Session_start();
Session_destroy();
header('Location:login.php');
exit();
?>