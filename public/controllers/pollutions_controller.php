

<?php
//# controllers/pollutions_controller.php
require_once('base_controller.php');
require_once('models/pollutions_model.php');
require_once('models/streets_model.php');

class PollutionsController extends BaseController
{
  function __construct()
  {
    //set nom du fichier:  view/pollutions/***.php
    $this->folder = 'pollutions';
  }

  public function index()
  {

    $street =  streetsModel::find($_GET['street_id']);
    $pollutions = pollutionsModel::allByStreetID($_GET['street_id']);
    $data = array('pollutions' => $pollutions, 'street' => $street);
    // index: rendre dans fichier index.php
    $this->render('index', $data);
  }

  // fonction appellé par views, controller
  public function edit()
  {

    $streets = streetsModel::all();
    $list = pollutionsModel::find($_GET['id']);
    $data = array('pollutions' => $list, 'streets' => $streets);
    $this->render('edit', $data);
  }


    public function create()
    {
      $streets = streetsModel::all();
      if (isset($_POST['submit'])) {
        // update
        $curTime = new DateTime();

        // createPollutionLog
        $pollution = [
          "street_id" => $_POST['street_id'],
          "status_pollution" => $_POST['status_pollution'],
          "created_date" => $curTime ->format('Y-m-d H:i:s'),
          "update_date" => $curTime->format('Y-m-d H:i:s')
        ];
        $createPollution = pollutionsModel::create($pollution);
        // update street
        $streetUpdate = [
          "id" => $_POST['street_id'],
          "current_pollution" => $_POST['status_pollution']
        ];
        $streetsUpdate = streetsModel::updateLastPollution($streetUpdate);
        //
        $pollutions = pollutionsModel::allByStreetID($pollution['street_id']);
        $data = array('pollutions' => $pollutions,'streets' => $streets, 'title' => 'created success');
        // index: rendre dans fichier index.php
        $this->render('index', $data);

      }else {
        // code...
          $data = array('title' => '','streets'=> $streets);
          $this->render('create', $data);
      }
    }
}
