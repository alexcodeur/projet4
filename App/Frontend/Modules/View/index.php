<?php
foreach ($listeNews as $news)
{
?>
  <h2><a href="news-<?= $news['id'] ?>.html"><?= htmlspecialchars($news['title']) ?></a></h2>
  <p><?= nl2br(htmlspecialchars($news['article'])) ?></p>
<?php
}
?>
