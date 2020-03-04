

<?php
//# controllers/streets_controller.php
require_once('base_controller.php');
require_once('models/streets_model.php');
require_once('models/lights_model.php');

class StreetsController extends BaseController
{
  function __construct()
  {
    // users: prendre cet repertoire dans view/users
    $this->folder = 'streets';
  }

  public function index()
  {
    $streets = streetsModel::all();
    $data = array('streets' => $streets, 'title' => '');
    // index: rendre dans fichier index.php
    $this->render('index', $data);
  }

  // fonction appellé par views, controller
  public function edit()
  {
    //list light
    $lights = lightsModel::allByStreetID($_GET['id']);

    if (isset($_POST['submit'])) {
      // update
      $street =[
        "id"        => $_POST['id'],
        "name_street" => $_POST['name_street']
      ];
      // envoyer message
      $update = streetsModel::update($street);
      $list = streetsModel::find($street['id']);
      $data = array('street' => $list, 'lights' => $lights,'title' => 'update success');
      $this->render('edit', $data);
    }
    if (isset($_GET['id'])) {
      $list = streetsModel::find($_GET['id']);
      $data = array('street' => $list, 'lights' => $lights, 'title' => '');
      $this->render('edit', $data);
    }
  }


  public function create()
  {
    if (isset($_POST['submit'])) {
      // update
      $curTime = new DateTime();
      $street = [
        "name_street" => $_POST['name_street'],
        "total_light" => 0,
        "current_trafic" => 1, // 1 normal
        "current_pollution" => 0, // 0 : pur
        "created_date" => $curTime ->format('Y-m-d H:i:s'),
        "update_date" => $curTime->format('Y-m-d H:i:s')
      ];
      // envoyer message
      $update = streetsModel::create($street);

      $streets = streetsModel::all();
      $data = array('streets' => $streets, 'title' => 'created success');
      // index: rendre dans fichier index.php
      $this->render('index', $data);

    }else {
      // code...
        $data = array('title' => '');
        $this->render('create', $data);
    }
  }
}
