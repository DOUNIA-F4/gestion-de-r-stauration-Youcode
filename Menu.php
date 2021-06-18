<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<?php 
include 'Admin/config/db.php';

session_start();
$selectT = $db->query("SELECT * FROM produits where categorie='salade'");
$produit1 = $selectT->fetchAll();

$selectT = $db->query("SELECT * FROM produits where categorie='Boisson'");
$produit2 = $selectT->fetchAll();


$selectT = $db->query("SELECT * FROM produits where categorie='Plat initial'");
$produit3 = $selectT->fetchAll();

$selectT = $db->query("SELECT * FROM produits where categorie='Fruit'");
$produit4 = $selectT->fetchAll();

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
                        <li class="nav-item active"><a class="nav-link" href="Menu.php">Nos menus</a></li>
                        <li class="nav-item"><a class="nav-link" href="Commande.php">Commande</a></li>
                        <?php if (isset($_SESSION['email'])) {

                            ?>
                            <li class="nav-item"><a class="nav-link"><?php echo $_SESSION['email']; ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
                            <?php } else {

                            ?> 

                            <li class="nav-item"><a class="nav-link" href="connecté.php">Connexion</a></li>
                            <li class="nav-item"><a class="nav-link" href="register.php">Inscription</a></li>
                            <?php } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                
            </div>
         
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->


   


    <!-- Start Products  -->
    <div class="products-box" style=" margin-bottom: 3em;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1 id="Menu">MENU</h1>
                        <p>Coisissez votre déjeuner</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".plats">Plats Principals</button>
                            <button data-filter=".salade">Salades</button>
                            <button data-filter=".boissons">Boissons</button>
                            <button data-filter=".fruits">Fruits</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
            <?php foreach($produit3 as $pro3) : ?>
                <div class="col-lg-3 col-md-6 special-grid plats">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                         
                            <img src="images/<?=$pro3["Photo"]?>" class="img-fluid" alt="Image" style="width:17em; height:17em">
                            <div class="mask-icon">
                                <a class="cart" href="commande.php?id_pr=<?=$pro3["id_pr"]?>">Demmander</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?=$pro3["nom_pro"]?></h4>
                            <h5><?=$pro3["prix"] ?>DH</h5>
                        </div>
                    </div>
                </div>
               <?php  endforeach?> 
                
               <?php foreach($produit1 as $pro1) : ?>
                <div class="col-lg-3 col-md-6 special-grid salade">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/<?=$pro1["Photo"] ?>" class="img-fluid" alt="Image" style="width:17em; height:17em">
                            <div class="mask-icon">
                                <a class="cart" href="commande.php?id_pr=<?=$pro1["id_pr"]?>">Demmander</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?=$pro1["nom_pro"] ?></h4>
                            <h5> <?=$pro1["prix"] ?>DH</h5>
                        </div>
                    </div>
                </div>
                <?php  endforeach?> 

                <?php foreach($produit2 as $pro2) : ?>

                <div class="col-lg-3 col-md-6 special-grid boissons">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/<?=$pro2["Photo"] ?>" class="img-fluid" alt="Image" style="width:17em; height:17em">
                            <div class="mask-icon">
                                <a class="cart" href="commande.php?id_pr=<?=$pro2["id_pr"] ?>">Demmander</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?=$pro2["nom_pro"] ?></h4>
                            <h5> <?=$pro2["prix"] ?>DH</h5>
                        </div>
                    </div>
                </div>

                <?php  endforeach?> 

                <?php foreach($produit4 as $pro4) : ?>
                <div class="col-lg-3 col-md-6 special-grid fruits">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/<?=$pro4["Photo"] ?>" class="img-fluid" alt="Image" style="width:17em; height:17em">
                            <div class="mask-icon">
                                <a class="cart" href="commande.php?id_pr=<?=$pro4["id_pr"] ?>">Demmander</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?=$pro4["nom_pro"] ?></h4>
                            <h5><?=$pro4["prix"] ?>DH</h5>
                        </div>
                    </div>
                </div>
                <?php  endforeach?> 
            </div>
        </div>
    </div>
    <!-- End Products  -->


<?php include 'includes/footer.php' ?>
</body>

</html>