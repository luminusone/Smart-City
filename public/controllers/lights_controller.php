<?php
// éclairage
//# controllers/lights_controller.php

require_once('base_controller.php');
require_once('models/streets_model.php');
require_once('models/lights_model.php');

class LightsController extends BaseController
{
  function __construct()
  {
    // users: folder dans view/users
    $this->folder = 'lights';
  }

  public function index()
  {
    $lights = [];
    if (isset($_GET['street_id']) && $_GET['street_id']) {
      // code...
      $lights = lightsModel::allByStreetID($_GET['street_id']);
    }else {
      // code...
      $lights = lightsModel::all();
    }

    $data = array('lights' => $lights, 'title' => '');
    // index: rendre dans file index.php
    $this->render('index', $data);

  }

  // fonction appellé par views, controller
  public function edit()
  {
    //list d'empoules
    $streets = streetsModel::all();

    if (isset($_POST['submit'])) {
      // update
      $street =[
        "id"        => $_POST['id'],
        "light_title" => $_POST['light_title'],
        "is_turnon" => $_POST['is_turnon'],
        "is_available" => $_POST['is_available']
      ];
      // envoyer message
      $update = lightsModel::update($street);
      $list = lightsModel::find($street['id']);
      $data = array('light' => $list, 'streets' => $streets,'title' => 'update success');
      $this->render('edit', $data);
    }
    if (isset($_POST['delete'])) {
      $lightID = $_POST['id'];
      $streetID = $_POST['street_id'];
      // code...
      lightsModel::delete($lightID);
      streetsModel::updateTotalLight($streetID);
      $data = array('title', "Delete success");
      $this->render('delete', $data);

    }
    if (isset($_GET['id'])) {
      $list = lightsModel::find($_GET['id']);
      $data = array('light' => $list, 'streets' => $streets, 'title' => '');
      $this->render('edit', $data);
    }
  }


  public function create()
  {
    $streets = streetsModel::all();

    if (isset($_POST['submit'])) {
      // update (mis à jour)
      $curTime = new DateTime();
      $light = [
        "street_id" => $_POST['street_id'],
        "light_title" => $_POST['light_title'],
        "is_turnon" => 0,
        "is_available" => 1,
        "created_date" => $curTime ->format('Y-m-d H:i:s'),
        "update_date" => $curTime->format('Y-m-d H:i:s')
      ];
      // create (créer un nouveau)
      $update = lightsModel::create($light);
      //update total light at street table (mis à jour le nombre d'empoules dans le table "street")
      streetsModel::updateTotalLight($_POST['street_id']);

      $lights = [];
      if (isset($_GET['street_id']) && $_GET['street_id']) {
        // code...
        $lights = lightsModel::allByStreetID($_GET['street_id']);
      }else {
        // code...
        $lights = lightsModel::all();
      }
      $data = array('lights' => $lights, 'streets' => $streets, 'title' => 'created success');
      // index: rendre dans file index.php
      $this->render('index', $data);

    }else {
      // code...
        $data = array( 'streets' => $streets,'title' => '');
        $this->render('create', $data);
    }
  }
}
