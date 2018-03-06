<p>Par <em><?= $news[''] ?></em>, le <?= $news['date_new_post']->format('d/m/Y à H\hi') ?></p>
<h2><?= htmlspecialchars($news['title']) ?></h2>
<p><?= nl2br(htmlspecialchars($news['article'])) ?></p>

<?php if ($news['date_new_post'] != $news['date_update_post']) { ?>
  <p><small><em>Modifiée le <?= $news['date_new_post']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>

<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>

<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{
?>
<fieldset>
  <legend>
    Posté par <strong><?= htmlspecialchars($comment['name']) ?></strong> le <?= $comment['date_add_comment_fr'] ?>
    <?php if ($user->isAuthenticated()) { ?> -
      <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>
  </legend>
  <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
</fieldset>
<?php
}
?>

<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>
