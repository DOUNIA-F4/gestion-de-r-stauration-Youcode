
<?php 
$localName = 'localhost';
$dbname = 'youcodefood';
$user = 'root';
$pwd = '';

    $db = new PDO('mysql:host='.$localName.';dbname='.$dbname,$user,$pwd);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
  

