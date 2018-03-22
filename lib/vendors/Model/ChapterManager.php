<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Chapter;

abstract class ChapterManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un chapter.
   * @param $chapter Chapter Le chapter à ajouter
   * @return void
   */
  abstract protected function add(Chapter $chapter);

  /**
   * Méthode permettant d'enregistrer un chapter.
   * @param $chapter Chapter le chapter à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(Chapter $chapter)
  {
    if ($chapter->isValid())
    {
      $chapter->isNew() ? $this->add($chapter) : $this->modify($chapter);
    }
    else
    {
      throw new \RuntimeException('Le chapitre doit être validé pour être enregistré');
    }
  }

  /**
   * Méthode renvoyant le nombre de chapitre total.
   * @return int
   */
  abstract public function count();

  /**
   * Méthode permettant de supprimer un chapitre.
   * @param $id int L'identifiant du chapitre à supprimer
   * @return void
   */
  abstract public function delete($id);

  /**
   * Méthode retournant une liste de chapitre demandée.
   * @param $debut int Le premier chapitre à sélectionner
   * @param $limite int Le nombre de chapitre à sélectionner
   * @return array La liste des chapitres. Chaque entrée est une instance de Chapitre.
   */
  abstract public function getList($debut = -1, $limite = -1);

  /**
   * Méthode retournant un chapitre précis.
   * @param $id int L'identifiant du chapitre à récupérer
   * @return Chapitre Le chapitre demandé
   */
  abstract public function getUnique($id);

  /**
   * Méthode permettant de modifier un chapitre.
   * @param $chapter chapitre le chapitre à modifier
   * @return void
   */
  abstract protected function modify(Chapter $chapter);

}

