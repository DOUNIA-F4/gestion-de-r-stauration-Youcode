<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>


<?php 
 
 session_start();
 
 if(!isset($_SESSION['username']))
 {
     header('location:login.php');
 }
if(isset($_GET['id_prod']) && !empty($_GET['id_prod']))
{
    $id=$_GET['id_prod'];
    $stmt_eidt=$db->prepare('SELECT * FROM produits WHERE id_pr=:uid');
    $stmt_eidt->execute(array(':uid'=>$id));
    $edit_row=$stmt_eidt->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
}else 

{
    header("Location:produits.php");
}

if(isset($_POST['sub']))

    {

        $image=$_FILES['pict']['name'];
		$tmp_dir=$_FILES['pict']['tmp_name'];
        $imageSize=$_FILES['pict']['size'];
        $upload_dir='../images/';
        $imgExt=strtolower(pathinfo($image,PATHINFO_EXTENSION));
        $valid_extensions=array('jpeg', 'jpg', 'png');
        $pic=rand(1000, 1000000).".".$imgExt;
        unlink($upload_dir.$edit_row['Photo']);
        move_uploaded_file($tmp_dir, $upload_dir.$pic);
        
        $name = $_POST['nom'];
        $cat = $_POST['cat'];
        $prix =$_POST['prix'];

      
        $stmt=$db->prepare('UPDATE produits SET nom_pro=:nom_produit,categorie=:category,prix=:prix,Photo=:pict WHERE id_pr=:uid');
        $stmt->bindParam(':nom_produit', $name);
        $stmt->bindParam(':category', $cat);
        $stmt->bindParam(':prix',$prix);
        $stmt->bindParam(':pict',$pic);
	
        $stmt->bindParam(':uid',$id);
        if($stmt->execute())
        {
            ?>
            <script type="text/javascript">
                alert('Modifier avec succès');
                window.location.href="produits.php";
            </script>
            <?php 
        }else 

        ?>
        <script type="text/javascript">
            alert('Error');
            // window.location.href="produitss.php";
        </script>
        <?php 

    }
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
                        <h3>Produits</h3>
                    </div>
                    <div class="row">
                     
                    <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Edit Produit</div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    
                                    <form class="form-horizontal"  method="POST"  enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Nom du Produit</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nom" class="form-control"  value="<?php echo $nom_pro ?>" required >
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="form-group row">
                                            <label class="col-sm-2">category</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="cat" required>
                                            <option value=""><?php echo $categorie ?></option>
                                            <option value="Boisson">Boisson</option>
                                            <option value="Plat initial">Plat initial</option>
                                            <option value="salade">salade</option>
                                            <option value="Fruit">Fruit</option>
                                            </select>
                                            </div>
                                        </div>
  
                                        <div class="line"></div><br>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Prix</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="prix" value="<?php echo $prix ?>" class="form-control"  required>
                                            </div>
                                        </div>


                                        <div class="line"></div><br>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Picture</label>
                                            <div class="col-sm-10">
                                            <img src="../images/<?php echo $Photo; ?>" class="img-rounded">
                                            <input type="file" name="pict"  placeholder="Import an image" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                          
                                          
                                                
                                 
                                        <div class="line"></div><br>
                                        <div class="form-group row">
                                            <div class="col-sm-4 offset-sm-2">
                                                <button type="submit" class="btn btn-secondary mb-2"><i class="fas fa-times"></i> Cancel</button>
                                                <button type="submit" name="sub" class="btn btn-primary mb-2"><i class="fas fa-save"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>

</body>

</html>