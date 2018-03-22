<?php
namespace Entity;

use \OCFram\Entity;

class Comments extends Entity
{
  protected $id,
            $chapter,
            $name,
            $comment,
            $date_add_comment,
            $signalComment;

  const INVALID_AUTHOR = 1;
  const INVALID_CONTENT = 2;
  const INVALID_SIGNAL = 3;

  public function isValid()
  {
    return !(empty($this->name) || empty($this->comment));
  }

  public function setId($id)
  {
    $this->id = (int) $id;
  }

  public function setChapter($chapter)
  {
    $this->chapter = (int) $chapter;
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

  public function setSignalComment($signalComment)
  {
      if (!is_string($signalComment))
      {
          $this->erreurs[] = self::INVALID_SIGNAL;
      }
      $this->signalComment = $signalComment;
  }

    public function id()
    {
        return $this->id;
    }

  public function chapter()
  {
    return $this->chapter;
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

  public function signalComment()
  {
    return $this->signalComment;
  }
}
