<?php
class lightsModel
{
 public $id;
 public $light_title;
 public $street_id; // total light dans table table
 public $is_turnon; // 0: faible 1: normal 2: élevé
 public $is_available; // 0 : Clair 1: Pollution
 public $name_street;
 public $created_date;
 public $update_date;

 function __construct($id, $light_title, $street_id,$is_turnon,$is_available,$name_street,$created_date,$update_date)
 {
   $this->id = $id;
   $this->street_id = $street_id;
   $this->name_street = $name_street;
   $this->light_title = $light_title;
   $this->is_turnon = $is_turnon;
   $this->is_available = $is_available;
   $this->created_date = $created_date;
   $this->update_date = $update_date;
 }
 // action query

 static function all()
 {
   $list = [];
   $db = DB::getInstance();
   $req = $db->query('SELECT light.*,smart_street.name_street  FROM light INNER JOIN smart_street ON light.street_id = smart_street.id ORDER BY id DESC');

   foreach ($req->fetchAll() as $item) {
     $list[] = new lightsModel($item['id'], $item['light_title'], $item['street_id'],$item['is_turnon'],$item['is_available'],$item['name_street'], $item['created_date'], $item['update_date']);
   }

   return $list;
 }

  static function allByStreetID($street_id)
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->prepare('SELECT light.*,smart_street.name_street FROM light INNER JOIN smart_street ON light.street_id = smart_street.id where  street_id = :street_id ORDER BY id DESC');
    $req->execute(array('street_id' => (int)$street_id));

    foreach ($req->fetchAll() as $item) {
      $list[] = new lightsModel($item['id'], $item['light_title'], $item['street_id'],$item['is_turnon'],$item['is_available'],$item['name_street'], $item['created_date'], $item['update_date']);
    }

    return $list;
  }

 static function find($id)
 {
   $db = DB::getInstance();
   $req = $db->prepare('SELECT light.*,smart_street.name_street FROM light INNER JOIN smart_street ON light.street_id = smart_street.id WHERE light.id = :id');
   $req->execute(array('id' => (int)$id));
   $item = $req->fetch();
   if (isset($item['id'])) {
     return new lightsModel($item['id'], $item['light_title'],$item['street_id'],$item['is_turnon'],$item['is_available'], $item['name_street'], $item['created_date'], $item['update_date']);
   }
   return null;
 }
//update
 static function update($updateItem){

   $db = DB::getInstance();
   $sql = "UPDATE light
           SET id = :id,
             light_title = :light_title,
             is_turnon = :is_turnon,
             is_available = :is_available,
             update_date = now()
           WHERE id = :id";
   $req = $db->prepare($sql);
   $req->execute($updateItem);
   return $req;
 }

 static function updateStatus($updateItem){
   $db = DB::getInstance();
   $sql = "UPDATE light
           SET id = :id,
             is_turnon = :is_turnon,
             update_date = now()
           WHERE id = :id";
   $req = $db->prepare($sql);
   $req->execute($updateItem);
   return $req;
 }
//end

   static function create($newItem){

     $db = DB::getInstance();

     $sql = sprintf(
       "INSERT INTO %s (%s) values (%s)",
       "light",
       implode(", ", array_keys($newItem)),
       ":" . implode(", :", array_keys($newItem))
     );
     $req = $db->prepare($sql);
     $req->execute($newItem);
     return $req;
   }
   //delete
 static function delete($id)
 {
   $db = DB::getInstance();
   $req = $db->prepare('DELETE FROM light WHERE id = :id');
   $req->execute(array('id' => $id));

   return null;
 }

}
