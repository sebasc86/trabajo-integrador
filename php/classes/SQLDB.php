<?php
require_once 'DB.php';




class SQLDB extends DB{

  private $host;
  private $nameDB;
  private $user;
  private $pass;
  private $db;
  private static $save = false;

  public function __construct($host, $nameDB, $user, $pass)
  {

    $this->host = $host;
    $this->nameDB = $nameDB;
    $this->user = $user;
    $this->pass = $pass;
  }


  public function connect(){
    try {
      $this->db = new PDO("mysql:host=$this->host;dbname=$this->nameDB",$this->user,$this->pass);
      $this->db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->db;
    } catch (PDOException $e) {
      echo 'base de datos no disponible';

    }
  }


  public function findAll($model) {

        // $query = $db->prepare("SELECT $value from usuario where id = 'email'");
        // $query->execute();
        // $email = $query->fetch(PDO::FETCH_ASSOC);
        // echo $email['email'];
  }


  public function find($value)
    {
        if (isset($value)){
        $model = Usuario::$tableName;
        $nameSearch = Usuario::$primaryKey;
        $query = self::connect()->prepare("SELECT * from $model where $nameSearch = '$value'" );
        $query->execute();
        $registro = $query->fetch(PDO::FETCH_OBJ);
        return $registro;
      }
    }


  public function save($usuario){

    if(ValidadorRegistro::$errors == NULL && $usuario->nombre !== NULL && !isset($_SESSION)){
      if(self::find($usuario->email) == NULL) {
        $sql = self::insert();
        $stmt = self::connect()->prepare($sql);
        $stmt -> bindValue(':nombre', $usuario->nombre, PDO::PARAM_STR);
        $stmt -> bindValue(':apellido', $usuario->apellido, PDO::PARAM_STR);
        $stmt -> bindValue(':mail', $usuario->email, PDO::PARAM_STR);
        $stmt -> bindValue(':password', $usuario->password, PDO::PARAM_STR);
        $stmt -> bindValue(':edad', $usuario->edad, PDO::PARAM_INT);
        $stmt -> bindValue(':sexo', $usuario->sexo[0],  PDO::PARAM_STR);
        $stmt -> bindValue(':conductor', $usuario->accion['conductor'],  PDO::PARAM_STR);
        $stmt -> bindValue(':acompanante', $usuario->accion['acompañante'],  PDO::PARAM_STR);
        $stmt -> bindValue(':foto_perfil', $usuario->imagen,  PDO::PARAM_STR);
        $stmt->execute();
      }
    } elseif(ValidadorProfile::$errors == NULL && isset($_SESSION) && $usuario->password != NULL){
        $sql = self::update();
        $stmt = self::connect()->prepare($sql);
        $stmt->bindValue(':password', $usuario->password, PDO::PARAM_STR);
        $stmt->bindValue(':mail', $usuario->email, PDO::PARAM_STR);
        $stmt -> bindValue(':conductor', $usuario->accion['conductor'],  PDO::PARAM_STR);
        $stmt -> bindValue(':acompanante', $usuario->accion['acompañante'],  PDO::PARAM_STR);
        $stmt->execute();
    }
  }



  private function insert(){
       return "INSERT INTO usuario (id,nombre,apellido,dni,telefono,mail,password,edad,sexo,conductor,acompanante,foto_perfil)
       VALUES (default, :nombre, :apellido, default, default, :mail, :password, :edad, :sexo, :conductor, :acompanante, :foto_perfil)";
   }


  private function update(){
    //  return "UPDATE usuario SET password=12345kkk6 WHERE mail = sebascoscia@gmail.com";
    return "UPDATE usuario SET password = :password WHERE mail = :mail";


    }


}






 ?>
