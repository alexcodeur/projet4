<?php
namespace Model;

use \Entity\Comments;

class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comments $comment)
  {
    $q = $this->dao->prepare('INSERT INTO comments SET chapter = :chapter, name = :name, comment = :comment, date_add_comment = NOW()');

    $q->bindValue(':chapter', $comment->chapter(), \PDO::PARAM_INT);
    $q->bindValue(':name', $comment->name(), \PDO::PARAM_STR);
    $q->bindValue(':comment', $comment->comment(), \PDO::PARAM_STR);

    $q->execute();

    $comment->setId($this->dao->lastInsertId());
  }

  public function getListOf($chapter)
  {
    if (!ctype_digit($chapter))
    {
      throw new \InvalidArgumentException('L\'identifiant du chapitre passé doit être un nombre entier valide');
    }

    $q = $this->dao->prepare('SELECT id, chapter, name, comment, signalComment, DATE_FORMAT(date_add_comment, \'%d-%m-%Y à %Hh:%imin\') AS date_add_comment_fr, signalComment FROM comments WHERE chapter = :chapter');
    $q->bindValue(':chapter', $chapter, \PDO::PARAM_INT);
    $q->execute();

    $comments = $q->fetchAll();

    return $comments;
  }

  public function validate($comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET signalComment = 1 WHERE id = :id');

    $q->bindValue(':id', $comment, \PDO::PARAM_INT);

    $q->execute();
  }

  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, chapter, name, comment, signalComment FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();

    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'vendors\Entity\Comments');
    return $q->fetch();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
  }

  public function deleteFromChapter($chapter)
  {
    $this->dao->exec('DELETE FROM comments WHERE chapter = '.(int) $chapter);
  }

  public function signalComment($commentSignal)
  {
      $q = $this->dao->prepare('UPDATE comments SET signalComment = 0 WHERE id = :id');
      $q->bindValue(':id', (int) $commentSignal, \PDO::PARAM_INT);
      $q->execute();
  }

  public function commentPosted($id)
  {
      $q = $this->dao->prepare('SELECT signalComment FROM comments WHERE id = :id');
      $q->bindValue(':id', $id, \PDO::PARAM_INT);
      $q->execute();

      return $q->fetch();
  }

  public function commentSignaled()
  {
      $q = $this->dao->query('SELECT chapter, signalComment FROM comments WHERE signalComment = FALSE');

      return $q->fetchAll(\PDO::FETCH_CLASS, Comments::class);
  }

  public function count()
  {
      return $this->dao->query('SELECT COUNT(*) FROM comments')->fetchColumn();
  }
}
