<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contactez-nous</title>
  <link rel="stylesheet" href="css/styles.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@100..900&display=swap" rel="stylesheet">
</head>
<body id="bodycontact">
<main>
<header>
    <img src="images/logo.svg" alt="Logo SEM" class="logo">

    <nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="explorer.php">Explorer</a></li>
        <li><a href="apropos.php">A propos</a></li>
        <li><a href="contact.php" class="actuel">Contact</a></li>
      </ul>
    </nav>
    <div class="header-spacer"></div>
  </header>
  <h1>Contact</h1>

<form
  action="https://formspree.io/f/xblpzegn"
  method="POST"
>
  <label>
    Votre adresse e-mail:
    <input type="email" name="email">
  </label>
  <label>
    Votre message (suggestions, questions, etc.):
    <textarea name="message"></textarea>
  </label>
  <button type="submit">Envoyer</button>
</form>
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
                <li><a href="index.php">Accueil</a></li>
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