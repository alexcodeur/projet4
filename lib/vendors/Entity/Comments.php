<?php
namespace Entity;

use \OCFram\Entity;

class Comments extends Entity
{
  protected $news,
            $name,
            $comment,
            $date_add_comment;

  const INVALID_AUTHOR = 1;
  const INVALID_CONTENT = 2;

  public function isValid()
  {
    return !(empty($this->name) || empty($this->comment));
  }

  public function setNews($news)
  {
    $this->news = (int) $news;
  }

  public function setName($name)
  {
    if (!is_string($name) || empty($name))
    {
      $this->erreurs[] = self::INVALID_AUTHOR;
    }

    $this->name = $name;
  }

  public function setComment($comment)
  {
    if (!is_string($comment) || empty($comment))
    {
      $this->erreurs[] = self::INVALID_CONTENT;
    }

    $this->comment = $comment;
  }

  public function setDateAddComment(\DateTime $dateAddComment)
  {
    $this->date_add_comment = $dateAddComment;
  }

  public function news()
  {
    return $this->news;
  }

  public function name()
  {
    return $this->name;
  }

  public function comment()
  {
    return $this->comment;
  }

  public function dateAddComment()
  {
    return $this->date_add_comment;
  }
}
