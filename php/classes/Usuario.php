<?php
require_once 'Model.php';

class Usuario extends Model {

	public static $tableName = 'usuario';

	public static $primaryKey = 'mail';

	public $nombre;

	public $apellido;

	public $email;

	public $password;

	public $edad;

	public $sexo;

	public $accion;

	public $terminos;

	public $imagen;

	public function agregarImagen($imagen)
	{
			$this->setImagen($imagen);
	}

	public function toModel($data)
	{
		if($data != NULL){
			if(isset($data['nombre'])){
				$this->setNombre($data['nombre']);
			}

			if(isset($data['apellido'])){
				$this->setApellido($data['apellido']);
			}

			if(isset($data['correo'])){
				$this->setEmail($data['correo']);
			}

			if(isset($data['password'])){
				$this->setPassword($data['password']);
			}

			if(isset($data['edad'])){
				$this->setEdad($data['edad']);
			}

			if(isset($data['sexo'])){
				$this->setSexo($data['sexo']);
			}

			if(isset($data['accion'])){
				$this->setAccion($data['accion']);
			}

			if(isset($data['terminos'])){
				$this->setTerminos($data['terminos']);
			}
		}
	}

	public function toArray()
	{
		$usuarioArray = [];
		$usuarioArray['nombre'] = $this->nombre;
		$usuarioArray['apellido'] = $this->apellido;
		$usuarioArray['email'] = $this->email;
		$usuarioArray['password'] = $this->password;
		return $usuarioArray;
	}

	public function setNombre($valor)
	{
		$this->nombre = $valor;
	}

	public function setApellido($valor)
	{
		$this->apellido = $valor;
	}

	public function setEmail($valor)
	{
		$this->email = $valor;
	}

	public function setPassword($valor)
	{
		$this->password =  $valor;
	}

	public function setEdad($valor)
	{
		$this->edad = $valor;
	}

	public function setSexo($valor)
	{
		$this->sexo = $valor;
	}

	public function setAccion($valor)
	{
		$this->accion = $valor;
	}

	public function setTerminos($valor)
	{
		$this->terminos = $valor;
	}

	public function setImagen($valor)
	{
		$this->imagen = $valor;
	}

}
