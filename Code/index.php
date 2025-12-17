<?php
session_start();
require "db.php";

$error = "";

// Si formulaire envoyé
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des données
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Récupération utilisateur
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Vérification mot de passe haché
    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["username"] = $user["username"];
        header("Location: cours_en_ligne.php");
        exit; // IMPORTANT pour que header fonctionne
    } else {
        $error = "Identifiants incorrects";
    }
}
?>




<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ENT</title>

  <link rel="stylesheet" href="style_index.css">
</head>

<body>

  <header class="navbar" role="banner">
    <nav role="navigation" aria-label="Navigation principale">
      <div class="nav-list">
        <a>UNIVERSITA DI CORSICA</a>
        <a>|</a>
        <a>NOS PORTAILS :</a>
        <a>Étudiants</a>
        <a>Personnels</a>
        <a>Recherche</a>
        <a>Partenaires pro</a>
        <a>Fondation</a>
      </div>
    </nav>
  </header>

  <header class="navbar-second">
    <nav class="nav-second-list">
      <a><img src="logo.png" alt="logo" height="80px"></a>  
      <a>Authentification | Campus numérique</a>
    </nav>
  </header>

  <main>
    <div class="login">
     <form class="login-box" id="loginForm" method="POST" action="index.php">
    <h2>> Vous êtes étudiant, personnel, vacataire ou ALUMNI de l'Università di Corsica</h2>

    <!-- Affichage du message d'erreur si login incorrect -->
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <input type="text" name="username" id="username" placeholder="Identifiant" required>
    <input type="password" name="password" id="password" placeholder="Mot de passe" required>

    <button type="submit">Se connecter</button>

    <a href="#" class="mdp_oublie">Mot de passe oublié ?</a>

    <p class="deco">
        Pour des raisons de sécurité, veuillez vous <span>déconnecter</span> et fermer votre navigateur lorsque vous avez fini d’accéder aux services authentifiés.
    </p>
</form>

    </div>
  </main>

  <div class="extra-box">
    <span>> Vous êtes nouvel arrivant à l'Università di Corsica, pour activer votre compte</span>
    <button class="extra-btn">CLIQUEZ ICI</button>
  </div>

  <div class="extra-box">
    <span>> Vous êtes extérieur, pour vous connecter</span>
    <button class="extra-btn">CLIQUEZ ICI</button>
  </div>


  
</body>
</html>
