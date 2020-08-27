<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="CSS/style.css" />
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
    <form method="post" class="box">
    <h1 class="box-title">Contactez-moi</h1>
        <label>Nom</label>
        <input type="text" name="nom" required><br><br>
        <label>Email</label>
        <input type="email" name="email" required><br><br>
        <label>Message</label>
        <textarea name="message" class="message" required ></textarea><br><br>
        <input type="submit" class="box-button">
    </form>
    <?php
    require('config.php');
    if(isset($_POST['message'])){
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: ' . $_POST['email'] . "\r\n";

        $message = '<h1>Message envoyé depuis la page Contact de monsite.fr</h1>
        <p><b>Nom : </b>' . $_POST['nom'] . '<br>
        <b>Email : </b>' . $_POST['email'] . '<br>
        <b>Message : </b>' . $_POST['message'] . '</p>';

        $retour = mail('destinataire@free.fr', 'Envoi depuis page Contact', $message, $entete);
        if($retour) {
            echo '<p class="errorMessage">Votre message a bien été envoyé.</p>';
        }
    }
    ?>

<?php
    
    if(!empty($_POST["send"])) {
        require('config.php');
      $nom = $_POST["nom"];
      $email = $_POST["email"];
      $message = $_POST["message"];
      $connexion = mysqli_connect("localhost", "root", "root", "MonSite") or die("Erreur de connexion: " . mysqli_error($connexion));
      $result = mysqli_query($connexion, "INSERT INTO messages (nom, email, message) VALUES ('" . $nom. "', '" . $email. "','" . $message. "')");
      if($result){
        $db_msg = "Vos informations de contact sont enregistrées avec succés.";
        $type_db_msg = "success";
      }else{
        $db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
        $type_db_msg = "error";
      }
    }
    ?>
</body>
</html>