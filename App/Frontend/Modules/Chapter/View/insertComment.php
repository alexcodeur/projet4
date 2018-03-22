<form action="" method="post">
  <p style="text-align: center;">
    <?= isset($erreurs) && in_array(\Entity\Comments::INVALID_AUTHOR, $erreurs) ? 'L\'auteur est invalide.<br />' : '' ?>
    <label for="name" style="font-size: 1.5em;">Pseudo</label><br />
    <input type="text" size="100" name="name" value="<?= isset($comment) ? htmlspecialchars($comment['name']) : '' ?>" required /><br />

    <?= isset($erreurs) && in_array(\Entity\Comments::INVALID_CONTENT, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    <label for="comment" style="font-size: 1.5em;">Commentaire</label><br />
    <textarea name="comment" rows="7" cols="100" required ><?= isset($comment) ? htmlspecialchars($comment['comment']) : '' ?></textarea><br />

    <input type="submit" value="Commenter" class="btn btn-primary" style="margin-top: 30px;" />
  </p>