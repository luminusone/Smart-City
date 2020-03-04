

<?php
// # controllers/trafics_controller.php
require_once('base_controller.php');
require_once('models/trafics_model.php');
require_once('models/streets_model.php');

class TraficsController extends BaseController
{
  function __construct()
  {
    //set nom du fichier:  view/trafics/***.php
    $this->folder = 'trafics';
  }

  public function index()
  {

    $street =  streetsModel::find($_GET['street_id']);
    $trafics = traficsModel::allByStreetID($_GET['street_id']);
    $data = array('trafics' => $trafics, 'street' => $street);
    // index: rendre dans fichier index.php
    $this->render('index', $data);
  }

  // fonction appellé par views, controller
  public function edit()
  {

    $streets = streetsModel::all();
    $list = traficsModel::find($_GET['id']);
    $data = array('trafics' => $list, 'streets' => $streets);
    $this->render('edit', $data);
  }


    public function create()
    {
      $streets = streetsModel::all();      
      
      if (isset($_POST['submit'])) {
        // update
        $curTime = new DateTime();

        // createTraficLog
        $trafic = [
          "street_id" => $_POST['street_id'],
          "status_trafic" => $_POST['status_trafic'],
          "created_date" => $curTime ->format('Y-m-d H:i:s'),
          "update_date" => $curTime->format('Y-m-d H:i:s')
        ];
        $createTrafic = traficsModel::create($trafic);
        // update street
        $streetUpdate = [
          "id" =>  $_POST['street_id'],
          "current_trafic" => $_POST['status_trafic']
        ];
        $streetsUpdate = streetsModel::updateLastTraffic($streetUpdate);
        //
        $trafics = traficsModel::allByStreetID($trafic['street_id']);
        $data = array('trafics' => $trafics,'streets' => $streets, 'title' => 'created success');
        // index: rendre dans fichier index.php
        $this->render('index', $data);

      }else {
        // code...
          $data = array('title' => '','streets' => $streets);
          $this->render('create', $data);
      }
    }
}
