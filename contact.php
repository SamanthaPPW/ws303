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
<form
  action="https://formspree.io/f/xblpzegn"
  method="POST"
>
  <label>
    Your email:
    <input type="email" name="email">
  </label>
  <label>
    Your message:
    <textarea name="message"></textarea>
  </label>
  <!-- your other form fields go here -->
  <button type="submit">Send</button>
</form>
</main>
</body>
</html>