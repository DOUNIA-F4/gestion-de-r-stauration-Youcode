<?php 
include 'includes/head.php';
	if(isset($_GET['id_prod']))
	{
		$stmt_select=$db->prepare('SELECT * FROM produits WHERE id_pr=:uid');
		$stmt_select->execute(array(':uid'=>$_GET['id_prod']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("../images/".$imgRow['Photo']);
		$stmt_delete=$db->prepare('DELETE FROM produits WHERE id_pr=:uid');
		$stmt_delete->bindParam(':uid', $_GET['id_prod']);
		if($stmt_delete->execute())
		{
			?>
			<script>
			alert("Spprimé avec  succès");
			window.location.href=('produits.php');
			</script>
			<?php 
		}else 

		?>
			<script>
			alert("Impossible de supprimer l'élément");
			window.location.href=('produits.php');
			</script>
			<?php 

	}

	?>