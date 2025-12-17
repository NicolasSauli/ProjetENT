<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style_cours_en_ligne.css">
  <title>Cours en ligne</title>
</head>

<body>

  <!--NAVBAR1 -->
  <header class="navbar" role="banner">
    <nav>
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

  <!--NAVBAR2-->
  <header class="navbar-second">
    <nav class="nav-second-list">
      <a><img src="logo.png" alt="logo" height="80"></a>
      <a>Cours en ligne | Università di Corsica</a>
    </nav>
  </header>

  <!--NAVBAR3-->
  <header class="navbar-trois">
    <div class="nav-trois-list">
      <span>MES OUTILS</span>
      <span>MES COURS EN LIGNE</span>
      <span>LE CATALOGUE DES COURS</span>
      <span>PODCASTS</span>
      <span>AIDE</span>
      <span>SE DÉTACHER DES COURS</span>
    </div>
  </header>


  <section class="banniere_bienvenue">
  <h1>Salute <strong><?php echo $_SESSION["username"]; ?></strong></h1>
  <p>Bienvenue sur la plateforme de cours en ligne
  de l'Università di Corsica</p>
</section>

<section class="barre_recherche">
  <form id="searchForm">
    <input
      type="text"
      id="searchInput"
      placeholder="Rechercher un cours dans ma liste"

      aria-label="Recherche"
    >
  </form>
</section>


<section class="grille_cours">

  <div class="cours">
    <h3>Réseau</h3>
    <button class="cours-btn" onclick="window.location.href='cours_reseau.html'">Accéder au cours</button>
    
  </div>

  <div class="cours">
    <h3>Web</h3>
    <button class="cours-btn">Accéder au cours</button>
  </div>

  <div class="cours">
    <h3>Mobile</h3>
    <button class="cours-btn">Accéder au cours</button>
  </div>

  <div class="cours">
    <h3>Algorithmique</h3>
    <button class="cours-btn">Accéder au cours</button>
  </div>

  <div class="cours">
    <h3>Architecture des ordinateurs</h3>
    <button class="cours-btn">Accéder au cours</button>
  </div>

  <div class="cours">
    <h3>Java</h3>
    <button class="cours-btn">Accéder au cours</button>
  </div>

  <div class="cours">
    <h3>Linux</h3>
    <button class="cours-btn">Accéder au cours</button>
  </div>

  <div class="cours">
    <h3>Git</h3>
    <button class="cours-btn">Accéder au cours</button>
  </div>

  <div class="cours">
    <h3>Communication scientifique</h3>
    <button class="cours-btn">Accéder au cours</button>
  </div>

</section>




</body>

<script>
  const searchForm = document.getElementById("searchForm");
  const searchInput = document.getElementById("searchInput");
  const cours = document.querySelectorAll(".cours");

  searchForm.addEventListener("submit", function(e) {
    e.preventDefault(); 

    const query = searchInput.value.toLowerCase();

    cours.forEach(cours => {
      const title = cours.querySelector("h3").textContent.toLowerCase();
      if(title.includes(query)) {
        cours.style.display = "flex"; // affiche
      } else {
        cours.style.display = "none"; // cache
      }
    });

    
  });
</script>


</html>
