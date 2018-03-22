<?php
namespace App\Backend\Modules\Chapter;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Chapter;
use \Entity\Comments;

class ChapterController extends BackController
{
  public function executeDisconnect(HTTPRequest $request)
  {
    $this->app->user()->setAuthenticated(false);
    $this->app->httpResponse()->redirect('/projet4/admin/');
  }

  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des chapitres');

    $managerChapter = $this->managers->getManagerOf('Chapter');
    $managerComment = $this->managers->getManagerOf('Comments');

    $commentSignaled = $managerComment->commentSignaled();

    $tab = [];

    foreach ($commentSignaled as $value) {
        if ( isset($tab[$value['chapter']]) ) {
            $tab[$value['chapter']]++;
        } else {
            $tab[$value['chapter']] = 1;
        }
    }

    $this->page->addVar('listeChapter', $managerChapter->getList());
    $this->page->addVar('nombreChapter', $managerChapter->count());
    $this->page->addVar('countCommentSignal', $tab);
  }

  public function executeInsert(HTTPRequest $request)
  {

    if ($request->postExists('author')) {
      $this->processForm($request);
    }

    $this->page->addVar('title', 'Ajout d\'un chapitre');
  }

  public function processForm(HTTPRequest $request)
  {
    $chapter = new Chapter([
      'author' => $request->postData('author'),
      'title' => $request->postData('title'),
      'article' => htmlspecialchars($request->postData('article'))
    ]);

    // L'identifiant du chapitre est transmis si on veut le modifier.
    if ($request->postExists('id')) {
      $chapter->setId($request->postData('id'));
    }

    if ($chapter->isValid()) {
      $this->managers->getManagerOf('Chapter')->save($chapter);

      $this->app->user()->setFlash($chapter->isNew() ? 'Le chapitre a bien été ajouté !' : 'Le chapitre a bien été modifié !');
    }
    else {
      $this->page->addVar('erreurs', $chapter->erreurs());
    }

    $this->page->addVar('chapter', $chapter);

    $this->app->httpResponse()->redirect('/projet4/admin/');
  }

  public function executeUpdate(HTTPRequest $request)
  {
    if ($request->postExists('author')) {
      $this->processForm($request);
    }
    else {
      $this->page->addVar('chapter', $this->managers->getManagerOf('Chapter')->getUnique($request->getData('id')));
    }
    $this->page->addVar('title', 'Modification d\'une chapter');
  }

  public function executeDelete(HTTPRequest $request)
  {
    $chapterId = $request->getData('id');

    $this->managers->getManagerOf('Chapter')->delete($chapterId);
    $this->managers->getManagerOf('Comments')->deleteFromChapter($chapterId);

    $this->app->user()->setFlash('Le chapitre a bien été supprimé !');

    $this->app->httpResponse()->redirect('.');
  }

  public function executeValidComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->validate($request->getData('idC'));

    $this->app->httpResponse()->redirect('/projet4/chapter-'.$request->getData('idN'));
  }

  public function executeDeleteComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->delete($request->getData('idC'));

    $this->app->user()->setFlash('Le commentaire a bien été supprimé !');

    if ($request->getData('idN') !== null) {
        $this->app->httpResponse()->redirect('/projet4/chapter-'.$request->getData('idN'));
    } else {
        $this->app->httpResponse()->redirect404();
    }
  }
}
