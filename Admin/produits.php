
<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>

<?php 
session_start();
if(!isset($_SESSION['username']))
{
    header('location:login.php');
}
$selectT = $db->query("SELECT * FROM produits");
$produits = $selectT->fetchAll();
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
                        <h3>Produits
                
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>id_pr</th>
                                        <th>nom Produits</th>
                                        <th>categorie</th>
                                        <th>Prix</th>
                                        <th>picture</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                <?php foreach($produits as $produit):?>
                                    <tr>
                                        <td><?=$produit['id_pr'] ;?></td>
                                        <td><?=$produit['nom_pro'] ;?></td>
                                        <td><?=$produit['categorie'] ;?></td>
                                        <td><?=$produit['prix'] ;?></td>
                                        <td><img src="../images/<?= $produit['Photo'];?>" width="200px"></td>
                                        <td class="text-right">
                                            <a href="EditProduits.php?id_prod=<?= $produit['id_pr'];?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="deleteProduits.php?id_prod=<?=$produit['id_pr'];?>" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
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