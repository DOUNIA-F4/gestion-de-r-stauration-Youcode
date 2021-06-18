<?php 
 include 'Admin/config/db.php';

session_start();


$errors   = array();
if (isset($_POST['reg_user'])) {

	$username   = $_POST['name'];
	$email	    = $_POST['email'];
	$password_1 = $_POST['pass'];
	$password_2 = $_POST['re_pass'];


	// checking filled
	if (empty($username)) { 
		array_push($errors, "-le nom obligatoire");
	}

	if (empty($email)) {
		array_push($errors, "-Email obligatoire");
	}

	if ($password_1 != $password_2) {
		array_push ($errors, "-Le mot de passe que vous avez saisi ne correspond pas");
	} 

	if (empty($password_1)) {
		array_push($errors, "-le mot de passe obligatoire");
	}


	

	
	// Insert New Data
	if (count($errors) == 0) {
		$password = md5($password_1);

		$stmt=$db->prepare('INSERT INTO apprenant(name,email,motdpass) VALUES (:nom,:email,:pass)');
		$stmt->bindParam(':nom',$username);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':pass',$password);
		if($stmt->execute())
             {

				header('location: connecté.php');

             }
	}

}


// Click Login
if (isset($_POST['login_user'])) {
	$email	    = $_POST['emaill'];
	$password = $_POST['passs'];

	if (empty($email)) {
		array_push($errors, "-Email obligatoire");
	}

	if (empty($password)) {
		array_push($errors, "le mot de passe obligatoire");
	}

	if (count($errors) == 0) {
		$password = md5($password);

		$query =$db->query("SELECT * FROM apprenant WHERE email='$email' AND motdpass='$password'");
		
		if ($query->rowCount()  > 0) {
			$appr=$query->fetchAll();
			foreach($appr as $apprs)
			{
				$_SESSION['id']=$apprs['id_apr'];
			}
			$_SESSION['email'] = $email;
			header('location:commande.php');
		} else {
			array_push($errors, "Error Email ou mot de passe incorrect");
		}
	}
}



?>