<!DOCTYPE html>
<html lang="en">
<head>
    
<?php include 'includes/head.php' ;
include 'registreProcess.php';
     
?>

<?php 
       



?>
   
   
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">S'inscrire</h2>
                        <?php if (count($errors) > 0) :  ?>
                                <div class="error">
                                    <?php foreach ($errors as $error) : ?>
                                        <p><?php echo $error ?> </p>
                                    <?php endforeach ?>
                                </div>
                        <?php endif ?>
                        <form method="POST"  action="register.php" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Votre Nom" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Votre Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Mot de passe"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Répétez votre mot de passe"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="reg_user" id="signup" class="form-submit" value="S'inscrire"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><a href="index.php"><img src="images/logo2.png" alt="sing up image"></a></figure>
                        <a href="connecté.php" class="signup-image-link">Je suis déjà membre</a>
                    </div>
                </div>
            </div>
        </section>

        

    <!-- JS -->
    <script src="js/main.js"></script>
</body>
</html>