<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel= "stylesheet" href="CSS/accueil.css">
</head>
<body>
<img src="images/Khady SALL 2.png" class="logo" width="270" height="121">
<header class="header">
        <ul id="menu">
            <li class="un"><a href="index.php">Accueil</a></li>
            <li class="deux"><a href="#">Articles</a></li>            
            <li><a href="maGalerie.php">Galerie</a>  </li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="register.php">Connexion</a></li>
          </ul>         
    </header>
    <?php
        require('config.php');
        session_start();
        
        if (isset($_POST['username'])){
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            
            
                $query = "SELECT * FROM `Users` WHERE username='$username' and password='".hash('sha256', $password)."'";
            $result = mysqli_query($conn,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);

            if($rows==1){
                // creation de la session avec le nom de l'user connecte...
                $_SESSION['username'] = $username;

                // redirection vers...
                header("Location: session.php");
            } else {
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        
        }
    ?>
    <form class="box" action="" method="post" name="login">
        
        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">
        <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
        
        <!-- formulaire captcha-->
        <!--form action="validate.php" method="post">
		<table>
		<tr>
			<td>
				<label>Entrer le texte dans l'image</label>
				<input name="captcha" type="text">
				<img src="captcha.php" style="vertical-align: middle;"/>
			</td>
		</tr>
		<tr>
			<td><input name="submit" type="submit" value="Submit"></td>
		</tr>
		</table>
		</form-->

        <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
    </form>
</body>
</html>