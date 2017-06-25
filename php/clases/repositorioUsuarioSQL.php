<?php
require_once 'DB.php';


class RepositorioUsuariosSQL extends RepositorioUsuarios{

  private $host;
  private $nameDB;
  private $user;
  private $pass;
  private $db;

  public function __construct($host, $nameDB, $user, $pass)
  {

    $this->host = $host;
    $this->nameDB = $nameDB;
    $this->user = $user;
    $this->pass = $pass;
  }


  public function connect(){
    try {
      $this->db = new PDO("mysql:host=$this->host;dbname=$this->nameDB;charset=utf8mb4",$this->user, $this->pass);
      $this->db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->db;
    } catch (PDOException $e) {
      echo "La base de datos no esta disponible";
    }
  }


  public function traerTodosLosUsuarios() {


    $query = self::connect()->prepare("SELECT * from usuario");
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;
  }



  public function find($value, $model)
    {
      $nameSearch = $model::$primaryKey;
      $query = self::connect()->prepare("SELECT * from $model where $nameSearch = '$value'" );
      $query->execute();
      $registro = $query->fetch(PDO::FETCH_ASSOC);
      return $registro[$model::$primaryKey];
    }

  public function save($model){
  // {
  //   $current = $this->find($model::$primaryKey, $model);
  //   if (!$current) {
  //     $usuario = $model->toArray();
  //     $registros = file_get_contents($this->path);
  //     $registros = json_decode($registros, true);
  //     $registros[$model::$name][] = $usuario;
  //     file_put_contents($this->path, json_encode($registros));
  //   } else {
  //     //to do
  //   }
  }


}












 ?>
