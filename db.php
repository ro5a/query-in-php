<?php
private $user = "root";
private $pass = "";
private $dbName = "queryPHP";
private $dbHost = "localhost";
class DB_con  {



private function __construct() {

    parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
  
    if (mysqli_connect_error()) {
      exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
  
    parent::set_charset('utf-8');
  }
  public function get_user_id_by_name($name) {

    $name = $this->real_escape_string($name);
    $user = $this->query("SELECT id FROM users WHERE name = '" . $name . "'");
  
    if ($user->num_rows > 0){
      $row = $user->fetch_row();
      return $row[0];
    } else {
      return null;
    }
  }
  public function add_user ($name, $password) {

    $name = $this->real_escape_string($name);
    $password = $this->real_escape_string($password);
  
    return $this->query("INSERT INTO users (name, password) VALUES ('" . $name . "', '" . $password . "')");
  }
  public function delete($table,$id)
  {
   $res = mysql_query("DELETE FROM table WHERE user_id=".$id);
   return $res;
  }
  public function update($table,$id,$name,$password)
  {
   $res = mysql_query("UPDATE $table SET name='$name', password='$password' WHERE user_id=".$id);
   return $res;
  }

}
?>