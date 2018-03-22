<?php
namespace Model;

use \OCFram\Manager;
use \Entity\User;

abstract class UsersManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un administrateur.
   * @param $user User l'administrateur à ajouter.
   * @return void.
   */
  abstract public function addAdmin(User $user);

  /**
   * Méthode permettant de récupérer un administrateur.
   * @param $user User l'administrateur à récupérer.
   * @return void
   */
  abstract public function getAdmin();
}
