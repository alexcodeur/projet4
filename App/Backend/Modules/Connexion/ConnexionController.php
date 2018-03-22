<?php
namespace App\Backend\Modules\Connexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\HTTPResponse;
use \Entity\User;

class ConnexionController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');

    $data = $this->managers->getManagerOf('Users')->getAdmin();

    if ($request->postExists('login'))
    {
      $login = $request->postData('login');
      $password = $request->postData('password');

      foreach ($data as $key => $value)
      {
        if ($login == $value['customer'] && password_verify($password, $value['pass']))
        {
          $this->app->user()->setAuthenticated(true);
          $this->app->httpResponse()->redirect('.');
        }
      }

    }
  }

  public function executeRecord(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Inscription');

    $data = $this->managers->getManagerOf('Users');

    if ($request->postExists('customer'))
    {
      $customer = $request->postData('customer');
      $email = $request->postData('email');
      $password = $request->postData('password');

      $options = ['cost' => 12];
      $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);

      $user = new User([
        'customer' => $customer,
        'email' => $email,
        'pass' => $password_hash
      ]);

      $data->addAdmin($user);

      $this->app->httpResponse()->redirect('/projet4/admin/disconnect');
    }

  }
}

