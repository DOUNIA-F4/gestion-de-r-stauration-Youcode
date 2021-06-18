<?php include 'config/db.php'; 

	
	?>	

<?php 
    Session_start();
   
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {   
            if(isset($_POST['username']) && isset($_POST['password'])){
                $username = $db->quote($_POST['username']);
                $password = $db->quote($_POST['password']);
                $select = $db->query("select * from admin where username = $username and password = $password");
                
                if($select->rowCount() > 0){
                    $_SESSION['username'] = $username;
                    header("Location: Dashbord.php");
				}
				
				else{
					$message = "Votre nom ou mot de passe invalid ";
				  }
            }
       
       
    }  
?>


<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
     <link rel="stylesheet" href="assets/vendor/bootstrap4/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="icon" type="image/ico" href="assets/img/icons/favicon.ico" />

</head>
<body>


    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/img/logo.png" alt="IMG">
				</div>
                <?php if (! empty($message)) { ?>
              <p class="errorMessage"><?php echo $message; ?></p>
                  <?php } ?>
				<form class="login100-form validate-form" action="<?php echo $_SERVER["PHP_SELF"]?> " METHOD="POST">
					<span class="login100-form-title">
						
                     
                   Bienvenue     
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" >
							Connecter
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>

</body>
</html>