<?php
require 'sql/confdb.php';

$nom_carte = isset($_GET['nom']) ? trim($_GET['nom']) : '';
$carte = null;

if ($nom_carte) {
  try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
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
</head>
<body>
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
    </body>
</html>