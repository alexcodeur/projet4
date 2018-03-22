<?php
namespace Model;

use \Entity\Chapter;

class ChapterManagerPDO extends ChapterManager
{
  protected function add(Chapter $chapter)
  {
    $q = $this->dao->prepare('INSERT INTO post SET author = :author, title = :title, article = :article, date_new_post = NOW()');

    $q->bindValue(':title', $chapter->title());
    $q->bindValue(':article', $chapter->article());
    $q->bindvalue(':author', $chapter->author());

    $q->execute();
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM post')->fetchColumn();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM post WHERE id = '.(int) $id);
  }

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, author, title, article, DATE_FORMAT(date_new_post, \'%d/%m/%Y à %Hh:%imin\') AS date_new_post, DATE_FORMAT(date_update_post, \'%d/%m/%Y à %Hh:%imin\') AS date_update_post FROM post ORDER BY id DESC';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }

    $q = $this->dao->query($sql);

    $listeChapter = $q->fetchAll(\PDO::FETCH_CLASS, Chapter::class);

    return $listeChapter;
  }

  public function getUnique($id)
  {
    $q = $this->dao->prepare('SELECT id, author, title, article, DATE_FORMAT(date_new_post, \'%d/%m/%Y\') AS date_new_post_fr, DATE_FORMAT(date_update_post, \'%d/%m/%Y\') AS date_update_post_fr FROM post WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();

    $data = $q->fetch();

    return $data;
  }

  protected function modify(Chapter $chapter)
  {
    $q = $this->dao->prepare('UPDATE post SET author = :author, title = :title, article = :article, date_update_post = NOW() WHERE id = :id');

    $q->bindValue(':author', $chapter->author());
    $q->bindValue(':title', $chapter->title());
    $q->bindValue(':article', $chapter->article());
    $q->bindValue(':id', $chapter->id(), \PDO::PARAM_INT);

    $q->execute();
  }

}
