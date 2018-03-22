<?php
namespace Model;

use \Entity\User;

class UsersManagerPDO extends UsersManager
{
  public function addAdmin(User $user)
  {
    $q = $this->dao->prepare('INSERT INTO users SET customer = :customer, email = :email, pass = :pass, date_new_users = NOW()');

    $q->bindValue(':customer', $user->customer(), \PDO::PARAM_STR);
    $q->bindValue(':email', $user->email());
    $q->bindValue(':pass', $user->pass());

    $q->execute();
  }

  public function getAdmin()
  {
    $q = $this->dao->query('SELECT customer, pass FROM users');

    $data = $q->fetchAll(\PDO::FETCH_CLASS, User::class);

    return $data;
  }
}
