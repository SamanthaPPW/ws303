<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page à propos</title>
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
        <li><a href="explorer.php">Explorer</a></li>
        <li><a href="apropos.php" class="actuel">A propos</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
    <div class="header-spacer"></div>
  </header>
  <main>
    <section class="a-propos">
      <h1>Qui sommes-nous ?</h1>
      <div class="equipe">
        
        <div class="membre">
          <h2>S</h2>
          <div class="photo">
            <img src="images/samphoto.png" alt="photo de Samantha">
          </div>
          <p><strong>Je suis Sam</strong>, la développeuse fullstack de ce projet.<br>
          Lors de celui-ci, j’ai fait :
          <ul>
            <li>L'intégration du site</li>
            <li>La base de donnée et son accès par du php</li>
            <li>L'hébergement du site</li>
          </ul>
        </p>
        </div>

        <div class="membre">
          <h2>E</h2>
          <div class="photo">
            <img src="images/image.png" alt="photo membre E">
          </div>
          <p><strong>Je suis Éléonore</strong>, la chargée de communication de ce projet.<br>
          Lors de celui-ci, j’ai fait :
          <ul>
            <li>Les recherches des data</li>
            <li>Les diagrammes</li>
          </ul>
          </p>
        </div>

        <div class="membre">
          <h2>M</h2>
          <div class="photo">
            <img src="images/image.png" alt="photo membre M">
          </div>
          <p><strong>Je suis Mush</strong>, le graphiste de ce projet.<br>
          Lors de celui-ci, j’ai fait :
          <ul>
            <li>Le logo</li>
            <li>Les visuels</li>
            <li>La maquette figma</li>
            <li>Une partie du dev. front</li>
          </ul>
          </p>
        </div>

      </div>
    </section>
  </main>

</body>
</html>