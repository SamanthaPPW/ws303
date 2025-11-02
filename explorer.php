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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<main>
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
<form action="explorer.php" method="get"> 
<section class="recherche">
  <h2>Barre de Recherche</h2> 
  
  <div class="search-container">
        <input type="text" name="rech" placeholder="Entrez votre recherche..." value="<?php echo htmlspecialchars($rech); ?>">
  
    <button type="submit" class="search-button">
      <i class="fas fa-search"></i>
    </button>
  </div>
</section>
</form>

<?php
require 'sql/confdb.php';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $passwd);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $rech_valeur = isset($_GET['rech']) ? strtolower(trim($_GET['rech'])) : "";
  $sql = "SELECT nom, region_courte, description, code_datawrapper FROM abonnements";
  $params = [];
  if (!empty($rech_valeur)) {
    $sql .= " WHERE nom LIKE :rech OR region_courte LIKE :rech";
    $params[':rech'] = "%" . $rech_valeur . "%";
  }
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  $abonnements = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  $abonnements = [];
}
?>

<section class="abonnements">
<?php if (count($abonnements) > 0): ?>
  <?php foreach ($abonnements as $abonnement): ?>
    <a href="page-carte.php?nom=<?php echo urlencode($abonnement['nom']); ?>" class="abonnement-card">
      
      <div class="image-placeholder">
          <?php echo $abonnement['code_datawrapper']; ?> 
      </div> 

      <div class="abonnement-info">
          <h2><?php echo htmlspecialchars($abonnement['nom']); ?></h2>
          <p><?php echo htmlspecialchars($abonnement['region_courte']); ?></p>
      </div>
    </a>
  <?php endforeach; ?>
<?php else: ?>
  <p>Aucun abonnement trouvé pour "<?php echo htmlspecialchars($rech); ?>".</p>
<?php endif; ?>
</section>
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
<!--





  <iframe title="Régions pour carte Mezzo" aria-label="Choropleth map" id="datawrapper-chart-JjALr" src="https://datawrapper.dwcdn.net/JjALr/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
@Snymeliv le code pour la carte des régions de la carte Mezzo


<iframe title="Région pour Pass ZOU! Etudes" aria-label="Choropleth map" id="datawrapper-chart-UygMq" src="https://datawrapper.dwcdn.net/UygMq/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
@Snymeliv le code pour la carte de la région du pass ZOU! Etudes

<iframe title="Région pour la Carte Etudiant / Via Corsica" aria-label="Choropleth map" id="datawrapper-chart-4uFYB" src="https://datawrapper.dwcdn.net/4uFYB/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
@Snymeliv le code pour la carte de la région de la carte Abonnement /  Via Corsica

<iframe title="Régions pour Carte +" aria-label="Choropleth map" id="datawrapper-chart-PjkLh" src="https://datawrapper.dwcdn.net/PjkLh/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Régions pour carte +

<iframe title="Régions pour Pass NOMAD" aria-label="Choropleth map" id="datawrapper-chart-GqgjC" src="https://datawrapper.dwcdn.net/GqgjC/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Mush
 — 
22/10/2025 18:05
banger
Eleo
 — 
22/10/2025 18:05
Régions pour Pass NOMAD


<iframe title="Région pour Imagine R" aria-label="Choropleth map" id="datawrapper-chart-XAgiG" src="https://datawrapper.dwcdn.net/XAgiG/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Région pour Imagine R

<iframe title="Régions pour Ma carte TER - 26" aria-label="Choropleth map" id="datawrapper-chart-KsIvY" src="https://datawrapper.dwcdn.net/KsIvY/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Régions pour Ma carte TER - 26


Eleo
 — 
22/10/2025 17:22
<iframe title="Régions pour Carte Rémi Liberté Jeune" aria-label="Choropleth map" id="datawrapper-chart-5GIjw" src="https://datawrapper.dwcdn.net/5GIjw/2/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Snymeliv
 — 
22/10/2025 17:22
c'est bon 😄
Eleo
 — 
22/10/2025 17:22
Régions pour Carte Rémi Liberté Jeune


<iframe title="Région pour Tarif TER Jeunes/ Pass BreizhGo" aria-label="Choropleth map" id="datawrapper-chart-rCK2F" src="https://datawrapper.dwcdn.net/rCK2F/2/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Snymeliv
 — 
22/10/2025 17:21
pendant ce temps j'ai une erreur ligne 5 au php mdr
Eleo
 — 
22/10/2025 17:21
Région pour Tarif TER Jeunes/ Pass BreizhGo


<iframe title="Régions pour la carte illico LIBERTÉ JEUNES" aria-label="Choropleth map" id="datawrapper-chart-7tRte" src="https://datawrapper.dwcdn.net/7tRte/2/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Régions pour la carte illico LIBERTÉ JEUNES
<iframe title="Régions pour Tarif Jeune Mobigo -26" aria-label="Choropleth map" id="datawrapper-chart-62dKv" src="https://datawrapper.dwcdn.net/62dKv/3/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Régions pour Tarif Jeune Mobigo -26

<iframe title="Cartes des offres étudiantes par région" aria-label="Choropleth map" id="datawrapper-chart-Umfgt" src="https://datawrapper.dwcdn.net/Umfgt/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Carte régions réductions

Eleo
 — 
22/10/2025 15:49
<iframe title="Région pour la carte Fluo" aria-label="Choropleth map" id="datawrapper-chart-8ySiL" src="https://datawrapper.dwcdn.net/8ySiL/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="622" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Région pour la carte Fluo

<iframe title="Cartes des offres étudiantes par région" aria-label="Carte choroplèthe" id="datawrapper-chart-LWMtH" src="https://datawrapper.dwcdn.net/LWMtH/3/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="898" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Code carte















<iframe title="Nombre de voyageurs par région en 2024" aria-label="Small multiple column chart" id="datawrapper-chart-s7FlV" src="https://datawrapper.dwcdn.net/s7FlV/1/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="383" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Diagramme nb de voyageurs par région en 2024
<iframe title="Nombre de voyageurs par région en 2015" aria-label="Small multiple column chart" id="datawrapper-chart-TtZjl" src="https://datawrapper.dwcdn.net/TtZjl/2/" scrolling="no" frameborder="0" style="width: 0; min-width: 100% !important; border: none;" height="403" data-external="1"></iframe><script type="text/javascript">window.addEventListener("message",function(a){if(void 0!==a.data["datawrapper-height"]){var e=document.querySelectorAll("iframe");for(var t in a.data["datawrapper-height"])for(var r,i=0;r=e[i];i++)if(r.contentWindow===a.source){var d=a.data["datawrapper-height"][t]+"px";r.style.height=d}}});</script>
Diagramme nb de voyageurs en 2015





-->