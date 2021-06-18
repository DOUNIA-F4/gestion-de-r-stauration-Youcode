<?php 
session_start();

if(isset($_GET['id_pr']) && !empty($_GET['id_pr']))
{
    $id=$_GET['id_pr'];
    $stmt_eidt=$db->prepare('SELECT * FROM produits WHERE id_pr=:uid');
    $stmt_eidt->execute(array(':uid'=>$id));
    $edit_row=$stmt_eidt->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
}
else 

{
    header("Location:Menu.php");
}


	if (!isset($_SESSION['email'])) {
		$_SESSION['msg'] = "Vous devez d'abord vous connecter";
		header('location: connecté.php');
    }