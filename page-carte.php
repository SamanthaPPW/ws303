<?php
require 'sql/confdb.php';

$nom_carte = isset($_GET['nom']) ? trim($_GET['nom']) : '';
$carte = null;

if ($nom_carte) {
  try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // On sélectionne la description pour la mettre en titre H1, plus propre
    $stmt = $pdo->prepare("SELECT nom, description, details, code_datawrapper FROM abonnements WHERE nom = :nom"); 
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

                  <div class="carte-visuelle-et-info">
                  
                      <div class="carte-visuelle">
                          <?php echo $carte['code_datawrapper']; // Afficher le code iframe stocké ?>
                      </div>
                    
                      <div class="carte-info">
                          <h2>Informations sur la carte</h2>
                          <ul>
                          <?php
                          // Sépare les lignes pour générer une liste propre.
                          // Cela fonctionne avec les détails que nous avons insérés précédemment (séparés par \n).
                          $details_list = explode("\n", $carte['details']); 
                        
                          foreach ($details_list as $item) {
                            $item = trim($item);
                            if ($item) {
                              echo '<li>' . htmlspecialchars($item) . '</li>';
                            }
                          }
                          ?>
                          </ul>
                          <?php
                          // Ajout du lien vers le site officiel
                          if (strpos($carte['details'], 'Site :') !== false) {
                            preg_match('/Site : (.*)/', $carte['details'], $matches);
                            if (isset($matches[1])) {
                              $url = trim($matches[1]);
                              echo '<p class="lien-officiel"><a href="' . htmlspecialchars($url) . '" target="_blank">Voir le site officiel de l\'offre</a></p>';
                            }
                          }
                          ?>
                      </div>
                  
                  </div> </section>
        <?php else: ?>
              <p>Abonnement non trouvé.</p>
        <?php endif; ?>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <p class="footer-logo">SEM</p>
                <p class="copyright">© 2025 SEM. Tous droits réservés.</p>
            </div>
            
            <div class="footer-section">
                <h3>Navigation</h3>
                <ul>
                    <li><a href="explorer.php">Explorer les offres</a></li>
                    <li><a href="apropos.php">À propos de SEM</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Info légales</h3>
                <ul>
                    <li><a href="#">Mentions Légales</a></li> 
                    <li><a href="#">Politique de Confidentialité</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>