<!doctype html>
<html lang="en">
<?php 
 include 'config/db.php';

    session_start();

   

    if(isset($_GET['msg'])){
             
        if($_GET['msg']=='updated'){
?>
        <div class="alert alert-success text-center" role="alert">Modifier avec succès

      </div>


        <?php
        }
    }
      
        ?>
<?php 

  if(!isset($_SESSION['username']))
  {
      header('location:login.php');
  }

  if($_SERVER['REQUEST_METHOD'] == "POST"){ 

  
        if(isset($_POST['username']) && isset($_POST['password'])){
           
            $username = $db->quote($_POST['username']);
            $password = $db->quote($_POST['password']);
            $id_user = $_SESSION['username'];
                $query = "UPDATE `admin` SET `username`= $username,`password`=$password WHERE username= $id_user";

           
            $msg=$query;
            $select = $db->query($query);
            if(!empty($select)){
                header('Location:dashbord.php?editProfil=true&msg=updated');                 
            } else {
                $msg="Error Work";
            }
        }


   
}else{
$msg ='Erreur POST';
}


  $select = $db->query('SELECT * FROM admin where  username = '.$_SESSION['username']);
  $admin = $select->fetchAll();

    ?>
<body>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../My portfolio/assets/img/favicon.png" rel="icon">
    <title>ADMIN</title>
    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss3/css/flag-icon.min.css" rel="stylesheet">


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Apprenant', 'Produits'],
         <?php
         $sql = $db->query("SELECT nom_pro,COUNT(id_apr) FROM apprenant,commande,produits WHERE apprenant.id_apr=commande.id_appr AND produits.id_pr=commande.id_prod group by nom_pro");
         $fire = $sql->fetchAll();
          foreach ($fire as $fires) {
            echo"['".$fires['nom_pro']."',".$fires['COUNT(id_apr)']."],";
          }

         ?>
        ]);

        var options = {
          title: 'le nombre des apprenants pour chaque produits'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
</head>
<div class="wrapper">
         <?php include 'includes/header.php' ?>

      
    <div id="body" style="min-height: 60vh;" class="active">
            
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
                        <h3>Profile</h3>
                    </div>
                    <div class="row">
                     

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Edit Profile</div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <?php foreach($admin as $admin): ?>
                                    <form class="form-horizontal"  method="POST">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" value="<?= $admin["username"] ?>">
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Password</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="password" class="form-control" value="<?= $admin["password"] ?>">
                                            </div>
                                        </div>
                                        
                                       <?php  endforeach?>    
                                                
                                 
                                        <div class="line"></div><br>
                                        <div class="form-group row">
                                            <div class="col-sm-4 offset-sm-2">
                                                <button type="submit" class="btn btn-secondary mb-2"><i class="fas fa-times"></i> Cancel</button>
                                                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save"></i> Save</button>
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

    

</div>

<div id="piechart" style="width: 900px; height: 500px; margin-left:30em; margin-bottom:2em" ></div>

  <?php include 'includes/footer.php' ?>
</body>

</html>