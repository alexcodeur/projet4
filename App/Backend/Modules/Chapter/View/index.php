<?= ($nombreChapter > 1 ? '<p class="pShow">Il y a actuellement ' . $nombreChapter . ' chapitres. En voici la liste : </p>' :
                          '<p class="pShow">Il y a actuellement ' . $nombreChapter . ' chapitre. En voici la liste : </p>') ?>

<div class="table-responsive">

    <table class="table table-bordered table-hover">
      <tr>
          <th>Auteur</th>
          <th>Titre</th>
          <th>Date d'ajout</th>
          <th>Dernière modification</th>
          <th>Action</th>
          <th>Commentaire signalé</th>
      </tr>
    <?php
    foreach ($listeChapter as $chapter)
    {
    ?>
      <tr>
          <td>
              <?= htmlspecialchars($chapter['author']) ?>
          </td>
          <td>
              <a href="/projet4/chapter-<?= $chapter['id'] ?>"><?= htmlspecialchars($chapter['title']) ?></a>
          </td>
          <td>
              <?= ' le ' . $chapter['date_new_post'] ?>
          </td>
          <td>
              <?= ($chapter['date_new_post'] == $chapter['date_update_post'] ? '-' : $chapter['date_update_post']) ?>
          </td>
          <td>
              <a href="chapter-update-<?= $chapter['id'] ?>"><button class="btn btn-primary">Modifier</button></a>
              <a href="chapter-delete-<?= $chapter['id'] ?>"><button class="btn btn-danger">Supprimer</button></a>
          </td>
          <td>
              <p>Il y en a <?= $countCommentSignal[$chapter['id']] ?? 0 ?></p>
          </td>
      </tr>
    <?php
    }
    ?>
    </table>
</div>
<div class="btn-group btn-group-justified" role="group">
    <a href="/projet4/admin/chapter-insert" class="btn btn-primary" role="button">Ajouter un chapitre</a>
    <a href="/projet4/admin/record" class="btn btn-primary" role="button">Ajouter un admin</a>
    <a href="/projet4/admin/disconnect" class="btn btn-primary" role="button">Déconnexion</a>
</div>

<br />
