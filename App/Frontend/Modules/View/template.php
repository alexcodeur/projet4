<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?= isset($title) ? htmlspecialchars($title) : 'Blog de Jean Forteroche' ?></title>
  <link rel="stylesheet" href="Web/Public/css/style.css" />
</head>
<body>

  <header>
    <h1>Jean Forteroche, billet simple pour l'Alaska</h1>
    <img src="Web/Public/images/logo.png" alt="Image entête" />
  </header>

  <div>
    <nav>
      <a href="/testp4/">Acceuil</a>
      <a href="#">Contact</a>
      <a href="#">Questions</a>
      <a href="/testp4/admin/">Espace administration</a>
    </nav>
  </div>

  <section>
    <h2></h2>
    <p></p>
  </section>

  <section> <!-- 3 derniers billets d'afficher -->
    <?= $content ?>
  </section>

  <div>
    <h4>Mes reseaux sociaux</h4>
    <nav>
      <a href="www.facebook.com">FaceBook</a>
      <a href="www.twitter.com">Twitter</a>
      <a href="www.instagram.com">Instagram</a>
    </nav>
  </div>

  <footer>
    <a href="#">Contact</a>
    <a href="#">Mention légale</a>
  </footer>

</body>
</html>
