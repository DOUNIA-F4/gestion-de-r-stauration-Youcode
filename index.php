<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

 <?php include 'includes/headIndex.php'; 
   
   session_start();
 
 ?>

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
                        <li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="Menu.php">Nos menus</a></li>
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


    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides" style="height:87vh;" >
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/pizza1.jpg" alt="">
                <div class="container" >
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bienvenue à <br> Youssoufia AirLines </strong></h1>
                            <p class="m-b-40">Nous sommes au services de nos étudiants</p>
                            
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/salade1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bienvenue à <br> YOUCODE FOOD</strong></h1>
                            <p class="m-b-40">Nous sommes au services de nos étudiants</p>
                           
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/jus1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bienvenue à <br> YOUCODE FOOD</strong></h1>
                            <p class="m-b-40">Nous sommes au services de nos étudiants</p>
                            
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->




<?php include 'includes/footer.php' ?>
</body>

</html>