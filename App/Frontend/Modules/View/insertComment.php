<h2>Ajouter un commentaire</h2>
<form action="" method="post">
  <p>
    <?= isset($erreurs) && in_array(\Entity\Comments::INVALID_AUTHOR, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
    <label for="name">Pseudo</label>
    <input type="text" name="name" value="<?= isset($comment) ? htmlspecialchars($comment['name']) : '' ?>" /><br />

    <?= isset($erreurs) && in_array(\Entity\Comments::INVALID_CONTENT, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    <label for="comment">Contenu</label>
    <textarea name="comment" rows="7" cols="50"><?= isset($comment) ? htmlspecialchars($comment['comment']) : '' ?></textarea><br />

    <input type="submit" value="Commenter" />
  </p>
</form>

