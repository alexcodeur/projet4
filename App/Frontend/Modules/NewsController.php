<?php
namespace App\Frontend\Modules;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comments;

class NewsController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $nombreNews = $this->app->config()->get('nombre_news');

    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreNews.' dernières news');

    // On récupère le manager des news.
    $manager = $this->managers->getManagerOf('News');

    $listeNews = $manager->getList(0, $nombreNews);

    foreach ($listeNews as $news)
    {

      if (strlen($news->article()) > $nombreCaracteres)

      {

        $debut = substr($news->article(), 0, $nombreCaracteres);

        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';

        $news->setArticle($debut);
      }
    }
    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listeNews', $listeNews);
  }

  public function executeInsertComment(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Ajout d\'un commentaire');

    if ($request->postExists('name'))
    {
      $comment = new Comments([
        'news' => $request->getData('news'),
        'name' => $request->postData('name'),
        'comment' => $request->postData('comment')
      ]);

      if ($comment->isValid())
      {

        $this->managers->getManagerOf('Comments')->save($comment);

        $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');

        $this->app->httpResponse()->redirect('news-'.$request->getData('news').'.html');
      }
      else
      {
        $this->page->addVar('erreurs', $comment->erreurs());
      }

      $this->page->addVar('comment', $comment);
    }

  }

  public function executeShow(HTTPRequest $request)
  {
    $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));

    if (empty($news))
    {
      $this->app->httpResponse()->redirect404();
    }

    $this->page->addVar('title', $news->title());
    $this->page->addVar('news', $news);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($news->id()));
  }

}

