 <?php
class streetsModel
{
  public $id;
  public $name_street;
  public $total_light; // total light dans table light
  public $current_trafic; // 0: faible 1: normal 2: élevé
  public $current_pollution; // 0 : Clair 1: Pollution
  public $created_date;
  public $update_date;

  function __construct($id, $name_street, $total_light,$current_trafic,$current_pollution,$created_date,$update_date)
  {
    $this->id = $id;
    $this->name_street = $name_street;
    $this->total_light = $total_light;
    $this->current_trafic = $current_trafic;
    $this->current_pollution = $current_pollution;
    $this->created_date = $created_date;
    $this->update_date = $update_date;
  }
  // action query

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM smart_street ORDER BY id DESC');

    foreach ($req->fetchAll() as $item) {
      $list[] = new streetsModel($item['id'], $item['name_street'], $item['total_light'],$item['current_trafic'],$item['current_pollution'], $item['created_date'], $item['update_date']);
    }

    return $list;
  }
  

  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM smart_street WHERE id = :id');
    $req->execute(array('id' => $id));
    $item = $req->fetch();
    if (isset($item['id'])) {
      return new streetsModel($item['id'], $item['name_street'],$item['total_light'],$item['current_trafic'],$item['current_pollution'],  $item['created_date'], $item['update_date']);
    }
    return null;
  }
//update
  static function update($updateItem){

    $db = DB::getInstance();
    $sql = "UPDATE smart_street
            SET id = :id,
              name_street = :name_street,
              update_date = now()
            WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($updateItem);
    return $req;
  }

  static function updateLastTraffic($updateItem){
    $db = DB::getInstance();
    $sql = "UPDATE smart_street
            SET id = :id,
              current_trafic = :current_trafic,
              update_date = now()
            WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($updateItem);
    return $req;
  }
  static function updateLastPollution($updateItem){

    $db = DB::getInstance();
    $sql = "UPDATE smart_street
            SET id = :id,
              current_pollution = :current_pollution,
              update_date = now()
            WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($updateItem);
    return $req;
  }
  static function updateTotalLight($id){
    $db = DB::getInstance();
    $sql = "UPDATE smart_street
            SET id = :id,
              total_light = (select count(*) from light where light.street_id = :id),
              update_date = now()
            WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute(array('id' => $id));
    return $req;
  }
//end

    static function create($newItem){

      $db = DB::getInstance();

      $sql = sprintf(
        "INSERT INTO %s (%s) values (%s)",
        "smart_street",
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
    $req = $db->prepare('DELETE FROM smart_street WHERE id = :id');
    $req->execute(array('id' => $id));

    $item = $req->fetchAll();
    if (isset($item['id'])) {
      return new streetsModel($item['id'], $item['name_street'],$item['total_light'],$item['$current_trafic'],$item['$current_pollution'],  $item['created_date'], $item['update_date']);
    }
    return null;
  }

}
