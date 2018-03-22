<?php
namespace Entity;

use \OCFram\Entity;

class User extends Entity
{
  protected $id,
            $customer,
            $email,
            $pass,
            $date_new_users;

  // Getters
  public function id()
  {
    return $this->id;
  }

  public function customer()
  {
    return $this->customer;
  }

  public function email()
  {
    return $this->email;
  }

  public function pass()
  {
    return $this->pass;
  }

  public function date_new_users()
  {
    return $this->date_new_users;
  }

  // Setters
  public function setId($id)
  {
    if (!is_int($id) || empty($id))
    {
      throw new Exception("L'id doit être un nombre entier");
    }

    $this->id = $id;
  }

  public function setCustomer($customer)
  {
    if (!is_string($customer) || empty($customer))
    {
      throw new Exception("Le nom admin doit être une chaîne de caractère");
    }

    $this->customer = $customer;
  }

  public function setEMail($email)
  {
    if (empty($email))
    {
      throw new Exception("Vous devez entrez une adresse email valide");
    }

    $this->email = $email;
  }

  public function setPass($pass)
  {
    if (empty($pass))
    {
      throw new Exception("Vous devez entrez un mot de passe");
    }

    $this->pass = $pass;
  }

  public function setDateNewUsers($dateNewUsers)
  {
    $this->date_new_users = $dateNewUsers;
  }

}
