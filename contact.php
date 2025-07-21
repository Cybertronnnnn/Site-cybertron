<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact - Cyber-Tech</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header>
    <div class="container">
      <h1 class="logo">Cyber-Tech</h1>
      <nav>
        <ul>
          <li><a href="index.html">Accueil</a></li>
          <li><a href="contact.php" class="active">Contact</a></li>
          <li><a href="privacy.html">Politique de confidentialité</a></li>
          <li><a href="legal.html">Mentions légales</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="container">
    <h2>Contactez-nous</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $nom = htmlspecialchars($_POST["nom"]);
      $email = htmlspecialchars($_POST["email"]);
      $message = htmlspecialchars($_POST["message"]);

      $to = "njankouonj@gmail.com"; // 🔁 remplace par ton adresse email
      $subject = "Message de Cyber-Tech - $nom";
      $body = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";

      if (mail($to, $subject, $body)) {
        echo "<p style='color:green;'>Message envoyé avec succès !</p>";
      } else {
        echo "<p style='color:red;'>Erreur lors de l'envoi du message.</p>";
      }
    }
    ?>

    <form method="POST" action="contact.php" class="contact-form">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required />

      <label for="email">Email :</label>
      <input type="email" id="email" name="email" required />

      <label for="message">Message :</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">Envoyer</button>
    </form>
  </main>

  <footer>
    <div class="container footer-content">
      <p>&copy; 2025 Cyber-Tech. Tous droits réservés.</p>
      <nav>
        <ul>
          <li><a href="privacy.html">Politique de confidentialité</a></li>
          <li><a href="legal.html">Mentions légales</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </div>
  </footer>
</body>
</html>