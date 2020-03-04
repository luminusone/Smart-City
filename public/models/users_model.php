
<?php
class usersModel
{
  public $id;
  public $firstname;
  public $lastname;
  public $email;
  public $age;
  public $location;
  public $date;
  public $avatar;

  function __construct($id, $firstname, $lastname,$email,$age,$location,$date,$avatar)
  {
    $this->id = $id;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->age = $age;
    $this->location = $location;
    $this->date = $date;
    $this->avatar = $avatar;
  }
  // action query

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM users');

    foreach ($req->fetchAll() as $item) {
      $list[] = new usersModel($item['id'], $item['firstname'], $item['lastname'], $item['email'], $item['age'], $item['location'], $item['date'], $item['avatar']);
    }

    return $list;
  }

  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM users WHERE id = :id');
    $req->execute(array('id' => $id));

    $item = $req->fetch();
    if (isset($item['id'])) {
      return new usersModel($item['id'], $item['firstname'], $item['lastname'], $item['email'], $item['age'], $item['location'], $item['date'], $item[avatar]);
    }
    return null;
  }
    static function findByLocation($location)
    {
      $db = DB::getInstance();
      $req = $db->prepare('SELECT * FROM users WHERE location like %:location%');
      $req->execute(array('location' => $location));

      $item = $req->fetch();
      if (isset($item['id'])) {
        return new usersModel($item['id'], $item['firstname'], $item['lastname'], $item['email'], $item['age'], $item['location'], $item['date'], $item['avatar']);
      }
      return null;
    }


}
