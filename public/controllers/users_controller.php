

<?php
//# controllers/users_controller.php
require_once('base_controller.php');
require_once('models/users_model.php');

class UsersController extends BaseController
{
  function __construct()
  {
    // users: prendre cet repertoire dans view/users
    $this->folder = 'users';
  }

  public function index()
  {
    $users = usersModel::all();
    $data = array('users' => $users);
    // index: rendre dans fichier index.php
    $this->render('index', $data);
  }
}
