<?php
namespace Entity;

use \OCFram\Entity;

class News extends Entity
{
  protected $title,
            $article,
            $date_new_post,
            $date_update_post;

  const INVALID_TITLE = 1;
  const INVALID_ARTICLE = 2;

  public function isValid()
  {
    return !(empty($this->title) || empty($this->article));
  }


  // SETTERS //

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

  public function setDate_new_post(\DateTime $date_new_post)
  {
    $this->date_new_post = $date_new_post;
  }

  public function setDate_update_post(\DateTime $date_update_post)
  {
    $this->date_update_post = $date_update_post;
  }

  // GETTERS //

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
