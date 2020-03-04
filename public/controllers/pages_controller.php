
<?php
//# pages_controller.php
require_once('controllers/base_controller.php');
require_once('models/streets_model.php');
require_once('models/lights_model.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function dashboard()
  {
    //données dans bdd => $data

    $streets = streetsModel::all();
    $lights = lightsModel::all();
    $data =  array(
      //  'topStreet' => array('' => , );,
        'totalStreet' => count($streets),
        'totalSensor' => count($streets) * 2 + count($lights),
        'totalLight' => count($lights)
      );


    $this->render('dashboard', $data);
  }

  public function error()
  {
    $this->render('error',array(), 'master_view_no_menu.php');
  }
  public function login()
  {
    $this->render('login',array(), 'master_view_no_menu.php');
  }
}
