<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<?php 
include 'Admin/config/db.php';
include 'check.php';

if(isset($_POST['enregestrer']))
{
    $qt= $_POST['qt'];
    $appr=$_SESSION['id'];
    $nom=$_POST['ingre'];

    $stmt=$db->prepare('INSERT INTO commande(Qantity,id_appr,id_prod) VALUES (:qt,:id,:id_prod)');
    $stmt2=$db->prepare('INSERT INTO ingredients(nom,id_pr) VALUES (:nom,:id_ag)');
    $stmt->bindParam(':qt',$qt);
    $stmt->bindParam(':id',$appr);
    $stmt->bindParam(':id_prod',$id);
    $stmt2->bindParam(':nom',$nom);
    $stmt2->bindParam(':id_ag',$id);
    $stmt->execute();
    if($stmt2->execute())
    {
        ?>
        <script>
            alert("Ajouté avec  succès");
            window.location.href=('Menu.php');
        </script>
    <?php
    }else 

    {
        ?>
        <script>
            alert("Error");
            window.location.href=('commande.php');
        </script>
    <?php
    }
		
}
    
 

?>
 <?php include 'includes/headIndex.php'; ?>

<body>
    

  
  
   <!-- Start Main Top -->
   <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item "><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="Menu.php">Nos menus</a></li>
                        <li class="nav-item active"><a class="nav-link" href="Commande.php">Commande</a></li>
                        <?php if (isset($_SESSION['email'])) : ?>
                            <li class="nav-item"><a class="nav-link"><?php echo $_SESSION['email']; ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
	                     <?php endif ?>   
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                
            </div>
         
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->


   

  
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Mes commandes</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item active"> Commande </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main" style="margin-bottom:5em;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>commandez votre plats</h2>
                        <form id="contactForm" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="nameProduit" value="<?php echo $nom_pro ?>" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" id="prix" class="form-control" name="prix"  value="<?php echo $prix ?> DH">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <input type="number" id="qt" name="qt"  placeholder="votre quantité" required data-error="Veuillez entrer votre quantité" min="1" max="1000" style="width: 46em;border: 1px solid #ced4da">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="ingre" name="ingre"  placeholder="choisir votre des ingrédients">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" name="enregestrer" type="submit">Enregestrer</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>INFORMATIONS D'INGREDIENTS</h2>
                        <p>Vous pouvez choisir entre les éléments suivants, avec ou sans:</br> -Sauce chili </br>-Sauce tomate </br>-Mayonnaise </br>-Sel </br>-Sucre </br>Citron </br>Tout cela pour plaire à tous les goûts</br><strong>NB:</strong>Vous pouvez ajouter des suggestions à d'autres articles que vous aimez ou n'aimez pas dans votre repas </p>
                        
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

    




<?php include 'includes/footer.php' ?>
</body>

</html>