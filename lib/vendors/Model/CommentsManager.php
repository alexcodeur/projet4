<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Comments;

abstract class CommentsManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un commentaire.
   * @param $comment Le commentaire à ajouter
   * @return void
   */
  abstract protected function add(Comments $comment);

  /**
   * Méthode permettant d'enregistrer un commentaire.
   * @param $comment Le commentaire à enregistrer
   * @return void
   */
  public function save(Comments $comment)
  {
    if ($comment->isValid())
    {
      $comment->isNew() ? $this->add($comment) : $this->modify($comment);
    }
    else
    {
      throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
    }
  }

  /**
   * Méthode permettant de récupérer une liste de commentaires.
   * @param $chapter Le chapitre sur lequel on veut récupérer les commentaires
   * @return array
   */
  abstract public function getListOf($chapter);

  /**
   * Méthode permettant de valider un commentaire.
   * @param $comment Le commentaire à valider
   * @return void
   */
  abstract public function validate($comment);

  /**
   * Méthode permettant d'obtenir un commentaire spécifique.
   * @param $id L'identifiant du commentaire
   * @return Comment
   */
  abstract public function get($id);

  /**
   * Méthode permettant de supprimer un commentaire.
   * @param $id L'identifiant du commentaire à supprimer
   * @return void
   */
  abstract public function delete($id);

  /**
   * Méthode permettant de supprimer tous les commentaires liés à un chapitre
   * @param $chapter L'identifiant du chapitre dont les commentaires doivent être supprimés
   * @return void
   */
  abstract public function deleteFromChapter($chapter);

  /**
   * Méthode permettant de signaler un commentaire
   * @param $commentSignal Le commentaire à signalé
   * @return void
   */
  abstract public function signalComment($commentSignal);

  /**
   * Méthode permettant de vérifier si un commentaire est signalé
   * @param $id Le commentaire signalé
   * @return int
   */
  abstract public function commentPosted($comment);

  /**
   *  Méthode permettant de savoir quel chapitre contient un ou plusieurs commentaires signalé
   * @return void
   */
  abstract public function commentSignaled();

  /**
   * Méthode qui récupère chaques entrées
   * @return void
   */
  abstract public function count();
}

