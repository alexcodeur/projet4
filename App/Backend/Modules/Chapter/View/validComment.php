<form action="" method="post">
  <p class="pShow">
    <?= isset($erreurs) && in_array(\Entity\Comments::AUTEUR_INVALIDE, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
    <label>Pseudo</label>
    <br/>
    <input type="text" name="name" size="100" value="<?= htmlspecialchars($comment['name']) ?>" /><br />

    <?= isset($erreurs) && in_array(\Entity\Comments::CONTENU_INVALIDE, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    <label>Contenu</label><textarea name="comment" rows="7" cols="50"><?= htmlspecialchars($comment['comment']) ?></textarea><br />

    <input type="hidden" name="news" value="<?= $comment['news'] ?>" />
    <input type="submit" value="Modifier" class="btn btn-primary" />
  </p>
</form>
