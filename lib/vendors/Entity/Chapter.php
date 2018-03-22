<?php
namespace Entity;

use \OCFram\Entity;

class Chapter extends Entity
{
  protected $author,
            $title,
            $article,
            $date_new_post,
            $date_update_post;

  const INVALID_TITLE = 1;
  const INVALID_ARTICLE = 2;
  const INVALID_AUTHOR = 3;

  public function isValid()
  {
    return !(empty($this->author) || empty($this->title) || empty($this->article));
  }

  // SETTERS //
  public function setAuthor($author)
  {
    if (!is_string($author) || empty($author))
    {
      $this->erreurs[] = self::INVALID_AUTHOR;
    }

    $this->author = $author;
  }

  public function setTitle($title)
  {
    if (!is_string($title) || empty($title))
    {
      $this->erreurs[] = self::INVALID_TITLE;
    }

    $this->title = $title;
  }

  public function setArticle($article)
  {
    if (!is_string($article) || empty($article))
    {
      $this->erreurs[] = self::INVALID_ARTICLE;
    }

    $this->article = $article;
  }

  public function setDate_new_post($date_new_post)
  {
    $this->date_new_post = $date_new_post;
  }

  public function setDate_update_post($date_update_post)
  {
    $this->date_update_post = $date_update_post;
  }

  // GETTERS //
  public function author()
  {
    return $this->author;
  }

  public function title()
  {
    return $this->title;
  }

  public function article()
  {
    return $this->article;
  }

  public function date_new_post()
  {
    return $this->date_new_post;
  }

  public function date_update_post()
  {
    return $this->date_update_post;
  }
}

