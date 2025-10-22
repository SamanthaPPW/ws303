<?php
$rech = isset($_GET['rech']) ? strtolower($_GET['rech']) : "";




?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explorer</title>
  <link rel="stylesheet" href="css/styles.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <img src="images/logo.svg" alt="Logo SEM" class="logo">

    <nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="explorer.php" class="actuel">Explorer</a></li>
        <li><a href="apropos.php">A propos</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
    <div class="header-spacer"></div>
  </header>
  <section class="recherche">
    <input type="text" name="rech" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
  </section>
  <section class="abonnements">
    <?php
    ?>
  </section>
</body>
</html>