<p id="date-add">Par <em><?= htmlspecialchars($data['author']) ?></em>, le <?= $data['date_new_post_fr'] ?></p>
<div class="row show-article">
    <div class="col-lg-12" style="background-color: #F0F2F1;">
        <div>
            <h2 id="post-title"><?= htmlspecialchars($data['title']) ?></h2>
        </div>
        <div class="col-lg-6 col-lg-offset-3 text-post-show">
            <p><?= nl2br(htmlspecialchars_decode($data['article'])) ?></p>
        </div>
    </div>
</div>


<?php if ($data['date_update_post_fr'] != null) { ?>
  <p id="date-update">
      <small>
          <em>
              Modifiée le <?= $data['date_update_post_fr'] ?>
          </em>
      </small>
  </p>
<?php } ?>

<div class="comment-show" id="comment">
    <div class="signal-comment">
        <p class="pShow">
            <a href="commenter-<?= $data['id'] ?>">
                N'hésitez pas à laisser un commentaire !
            </a>
        </p>
<?php
if (empty($comments))
{
?>
<p class="pShow">Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{
    if ($comment['signalComment'] == 0)
    {
?>
        <fieldset class="bad-comment">
            <legend>
                Posté par <strong><?= htmlspecialchars($comment['name']) ?></strong>
                le <?= $comment['date_add_comment_fr'] ?>

                <?php if ($user->isAuthenticated()) { ?> -
                    <a href="admin/valid-comment-<?= $comment['id'] ?>/chapter-<?= $data['id'] ?>#comment">Valider</a> |
                    <a href="admin/comment-delete-<?= $comment['id'] ?>/chapter-<?= $data['id'] ?>#comment">Supprimer</a>
                <?php } ?>

                <p>
                    <?= nl2br(htmlspecialchars_decode($comment['comment'])) ?>
                </p>
                <p class="signal-comment"><strong>Commentaire signalé</strong></p>
            </legend>
        </fieldset>
<?php
    }
}

foreach ($comments as $comment)
{
    if ($comment['signalComment'] == 1)
    {
    ?>
        <fieldset class="good-comment">
            <legend>
                Posté par <strong><?= htmlspecialchars($comment['name']) ?></strong>
                le <?= $comment['date_add_comment_fr'] ?>

                <div>

                <p class="pShow">
                    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                </p>

                <a href="signal-<?= $comment['id'] ?>/chapter-<?= $data['id'] ?>#comment">
                    <button type="button" class="btn btn-danger">Signaler</button>
                </a>

                </div>
            </legend>
        </fieldset>
        <?php
    }
}
?>
    </div>
    <div>
        <p class="pShow">Voir les autres chapitres</p>
        <div class="link-chapter">
        <?php
        foreach ($allPost as $allPost)
        {
            if ($allPost['id'] == $data['id'] && $allPost['title'] == $data['title'])
            {
                echo '';
            }
            else
            {
        ?>
            <a href="chapter-<?= $allPost['id'] ?>"><?= htmlspecialchars($allPost['title']) ?></a><br/>
        <?php
            }
        }
        ?>
        </div>
    </div>
</div>