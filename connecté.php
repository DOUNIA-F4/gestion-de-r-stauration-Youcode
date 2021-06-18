<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'includes/head.php' ;
      include 'registreProcess.php';
   ?>
</head>
<body>

    <!-- End Main Top -->
    <div class="main">
<!-- Sing in  Form -->
<section class="sign-in">
    <div class="container" style="margin-top:10em;" >
        <div class="signin-content">
            <div class="signin-image">
            <figure><a href="index.php"><img src="images/logo2.png" alt="sing up image"></a></figure>
                <a href="register.php" class="signup-image-link">Créer un compte</a>
            </div>
         
            <div class="signin-form">
            <div class="alert alert-danger" role="alert"><?php echo $_SESSION['msg']; ?></div>
                <h2 class="form-title">Connecté</h2>
                        <?php if (count($errors) > 0) :  ?>
                                <div class="error">
                                    <?php foreach ($errors as $error) : ?>
                                        <p><?php echo $error ?> </p>
                                    <?php endforeach ?>
                                </div>
                        <?php endif ?>
                <form method="POST" action="connecté.php" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="emaill" id="email" placeholder="email"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="passs" id="your_pass" placeholder="Mot de passe"/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="login_user" id="signin" class="form-submit" value="Connecté"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</div>


<script src="js/main.js"></script>
   
   
</body>
</html>