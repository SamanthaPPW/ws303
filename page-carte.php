<?php
require 'sql/confdb.php';

$nom_carte = isset($_GET['nom']) ? trim($_GET['nom']) : '';
$carte = null;

if ($nom_carte) {
  try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT nom, details, code_datawrapper FROM abonnements WHERE nom = :nom");
    $stmt->execute([':nom' => $nom_carte]);
    $carte = $stmt->fetch(PDO::FETCH_ASSOC);

  } catch (PDOException $e) {
    // Gérer l'erreur
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?php echo $carte ? htmlspecialchars($carte['nom']) : 'Détails de la carte'; ?></title>
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
    <main>
        <?php if ($carte): ?>
              <section class="carte-details">
                  <h1><?php echo htmlspecialchars($carte['nom']); ?></h1>

                  <div class="carte-visuelle">
                      <?php echo $carte['code_datawrapper']; // Afficher le code iframe stocké ?>
                  </div>
                
                  <div class="carte-info">
                      <h2>Information sur la carte</h2>
                      <p><?php echo nl2br(htmlspecialchars($carte['details'])); ?></p>
                  </div>
                
              </section>
        <?php else: ?>
              <p>Abonnement non trouvé.</p>
        <?php endif; ?>
    </main>
    <footer>
    <p>Pas de footer :(</p>
  </footer>
    </body>
</html>