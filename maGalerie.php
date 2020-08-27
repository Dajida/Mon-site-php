<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie</title>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel= "stylesheet" href="CSS/galerie.css">
    <link rel= "stylesheet" href="CSS/accueil.css">
      
</head>

<body>
    <img src="images/Khady SALL 2.png" class="logo" width="260" height="121">
    <header class="header">
        <ul id="menu">
            <li><a href="session.php">Accueil</a></li>
            <li><a href="#">Articles</a></li>
            <li><a href="maGalerie">Galerie</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
          </ul>         
    </header>
    <h2 class="bienvenue">Bienvenue <?php echo $_SESSION['username']; ?>!</h2>
   
    <div class="conteneur">
        <div class="mes-images">
            <a href="images/img1.jpg" class="img1">
                <i class="icon ion-md-expand"></i>
                </a>
            <a href="images/img2.jpg" class="img2">
                <i class="icon ion-md-expand"></i>
                </a>
            <a href="images/img3.jpg" class="img3">
                <i class="icon ion-md-expand"></i>
                </a>
            <a href="images/img4.jpg" class="img4">
                <i class="icon ion-md-expand"></i>
                </a>
            <a href="images/img5.jpg" class="img5">
                <i class="icon ion-md-expand"></i>
                </a>
            <a href="images/img6.jpg" class="img6">
                <i class="icon ion-md-expand"></i>
                </a>    
            <a href="images/img7.jpg" class="img7">
                <i class="icon ion-md-expand"></i>
                </a>
            <a href="images/img8.jpg" class="img8">
                <i class="icon ion-md-expand"></i>
                </a>
        </div>
    </div>
    
</body>
</html>