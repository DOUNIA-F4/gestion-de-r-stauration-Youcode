
<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>

<?php 
session_start();
if(!isset($_SESSION['username']))
{
    header('location:login.php');
}
$selectT = $db->query("SELECT name,date,nom_pro,prix,Photo,Qantity,nom FROM apprenant,commande,produits,ingredients WHERE apprenant.id_apr=commande.id_appr AND produits.id_pr=commande.id_prod AND produits.id_pr=ingredients.id_pr ORDER BY date ASC");
$cmd = $selectT->fetchAll();
?>


<body>
    <div class="wrapper">
       
    <?php include 'includes/header.php' ?>
        <div id="body" class="active">
            
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary default-secondary-menu"><i class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span><?php echo $_SESSION['username'] ?></span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <h3>Les Commandes
                
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nom d'Apprenant</th>
                                        <th>nom Produits</th>
                                        <th>Photo de Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix</th>
                                        <th>Les ingédients</th>
                                        <th>Date de commande</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                               
                                <?php foreach($cmd as $cmds):?>
                                    <tr>
                                        <td><?=$cmds['name'] ;?></td>
                                        <td><?=$cmds['nom_pro'] ;?></td>
                                        <td><img src="../images/<?= $cmds['Photo'];?>" width="200px"></td>
                                        <td><?=$cmds['Qantity'] ;?></td>
                                        <td><?=$cmds['prix'] ;?> DH</td>
                                        <td><?=$cmds['nom'] ;?></td>
                                        <td><?=$cmds['date'] ;?></td>
                                    </tr>
                                 <?php endforeach ?>
                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include 'includes/footer.php' ?>
</body>

</html>