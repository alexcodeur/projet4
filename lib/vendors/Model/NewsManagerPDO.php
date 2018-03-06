<?php
namespace Model;

use \Entity\News;

class NewsManagerPDO extends NewsManager
{
  protected function add(News $news)
  {
    $requete = $this->dao->prepare('INSERT INTO Post SET title = :title, article = :article, date_new_post = NOW(), date_update_post = NOW()');

    $requete->bindValue(':title', $news->titre());
    $requete->bindValue(':article', $news->contenu());

    $requete->execute();
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM Post')->fetchColumn();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM Post WHERE id = '.(int) $id);
  }

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, title, article, date_new_post, date_update_post FROM Post ORDER BY id DESC';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }

    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');

    $listeNews = $requete->fetchAll();

    foreach ($listeNews as $news)
    {
      $news->setDate_new_post(new \DateTime($news->date_new_post()));
      $news->setDate_update_post(new \DateTime($news->date_update_post()));
    }

    $requete->closeCursor();

    return $listeNews;
  }

  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, title, article, date_new_post, date_update_post FROM Post WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();

    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');

    if ($news = $requete->fetch())
    {
      $news->setDate_new_post(new \DateTime($news->date_new_post()));
      $news->setDate_update_post(new \DateTime($news->date_update_post()));

      return $news;
    }

    return null;
  }

  protected function modify(News $news)
  {
    $requete = $this->dao->prepare('UPDATE Post SET title = :title, article = :article, date_update_post = NOW() WHERE id = :id');

    $requete->bindValue(':title', $news->titre());
    $requete->bindValue(':article', $news->contenu());
    $requete->bindValue(':id', $news->id(), \PDO::PARAM_INT);

    $requete->execute();
  }
}
