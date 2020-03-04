<?php
class pollutionsModel
{
 public $id;
 public $street_id;
 public $status_pollution;
 public $created_date;
 public $update_date;

 function __construct($id, $street_id, $status_pollution,$created_date,$update_date)
 {
   $this->id = $id;
   $this->street_id = $street_id;
   $this->status_pollution = $status_pollution; // 0: non 1: oui
   $this->created_date = $created_date;
   $this->update_date = $update_date;
 }
 // action query

 static function all()
 {
   $list = [];
   $db = DB::getInstance();
   $req = $db->query('SELECT * FROM pollution ORDER BY id DESC');

   foreach ($req->fetchAll() as $item) {
     $list[] = new pollutionsModel($item['id'], $item['street_id'], $item['status_pollution'], $item['created_date'], $item['update_date']);
   }

   return $list;
 }

  static function allByStreetID($street_id)
  {
    $list = [];
    $db = DB::getInstance();

    $req = $db->prepare('SELECT * FROM pollution where  street_id = :street_id ORDER BY id DESC');
    $req->execute(array('street_id' => (int)$street_id));

    foreach ($req->fetchAll() as $item) {
      $list[] = new pollutionsModel($item['id'], $item['street_id'], $item['status_pollution'], $item['created_date'], $item['update_date']);
    }

    return $list;
  }
 static function find($id)
 {
   $db = DB::getInstance();
   $req = $db->prepare('SELECT * FROM pollution WHERE id = :id');
   $req->execute(array('id' => $id));

   $item = $req->fetch();
   if (isset($item['id'])) {
     return new pollutionsModel($item['id'], $item['street_id'],$item['status_pollution'], $item['created_date'], $item['update_date']);
   }
   return null;
 }

 //create
   static function create($newItem){

     $db = DB::getInstance();

     $sql = sprintf(
       "INSERT INTO %s (%s) values (%s)",
       "pollution",
       implode(", ", array_keys($newItem)),
       ":" . implode(", :", array_keys($newItem))
     );
     echo $sql;
     $req = $db->prepare($sql);     
     $req->execute($newItem);
     return null;
   }

 static function delete($id)
 {
   $db = DB::getInstance();
   $req = $db->prepare('DELETE FROM pollution WHERE id = :id');
   $req->execute(array('id' => $id));

   $item = $req->fetchAll();
   if (isset($item['id'])) {
     return new pollutionsModel($item['id'], $item['street_id'],$item['status_pollution'], $item['created_date'], $item['update_date']);
   }
   return null;
 }

}
