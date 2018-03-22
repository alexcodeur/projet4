<form action="" method="post">

  <p class="pShow">

    <?= isset($erreurs) && in_array(\Entity\Chapter::INVALID_AUTHOR, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>

    <label>Auteur</label><br />

    <input type="text" name="author" size="100" value="<?= isset($chapter) ? htmlspecialchars($chapter['author']) : '' ?>" class="input-connexion" required /><br />

    <?= isset($erreurs) && in_array(\Entity\Chapter::INVALID_TITLE, $erreurs) ? 'Le titre est invalide.<br />' : '' ?>
    
    <label>Titre</label><br />
    
    <input type="text" name="title" size="100" value="<?= isset($chapter) ? htmlspecialchars($chapter['title']) : '' ?>" class="input-connexion" required /><br />

    <?= isset($erreurs) && in_array(\Entity\Chapter::INVALID_ARTICLE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    
    <label>Contenu</label><textarea rows="8" cols="60" name="article" ><?= isset($chapter) ? $chapter['article'] : '' ?></textarea><br />

<?php

if(isset($chapter))
{
?>
    <input type="hidden" name="id" value="<?= $chapter['id'] ?>" />
    <input type="submit" value="Modifier" name="modifier" class="btn btn-primary" />
<?php
}
else
{
?>
    <input type="submit" value="Ajouter" class="btn btn-primary" />
<?php
}
?>
  </p>
</form>
