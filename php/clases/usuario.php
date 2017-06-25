<?php
	require_once("repositorioUsuarios.php");

	class Usuario {
		private $nombre;
		private $email;
		private $username;
		private $id;
		private $password;
		private $pais;
		private $avatar;

		public function __construct($id, $nombre, $email, $username, $password, $pais) {
			$this->id = $id;
			$this->nombre =$nombre;
			$this->email = $email;
			$this->username = $username;
			$this->pais = $pais;
			$this->password = $password;
		}

		public function getNombre()
		{
			return $this->nombre;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function getUsername()
		{
			return $this->username;
		}
		public function getId()
		{
			return $this->id;
		}
		public function getPassword()
		{
			return $this->password;
		}
		public function getPais()
		{
			return $this->pais;
		}
		public function getAvatar()
		{
			$name = "img/" . $this->getId();
			$matching = glob($name . ".*");

			$info = pathinfo($matching[0]);
			$ext = $info['extension'];

			return $name . "." . $ext;
		}
		public function setName($name) {
			$this->name = $name;
		}
		public function setUsername($username) {
			$this->username = $username;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function setPais($pais) {
			$this->pais = $pais;
		}
		public function setPassword($password) {
			$this->password = password_hash($password, PASSWORD_DEFAULT);
		}
		public function setAvatar($avatar) {
			if ($avatar["error"] == UPLOAD_ERR_OK) {
		
				$path = "img/";

				if (!is_dir($path)) {
					mkdir($path, 0777);
				}

				$ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);

				move_uploaded_file($avatar["tmp_name"], $path . $this->getId() . "." . $ext);
			}
		}

		public function guardar(RepositorioUsuarios $repo) {
			$repo->guardar($this);
		}

		public function toArray() {
			return [
				"id" => $this->getId(),
				"name" => $this->getNombre(),
				"email" => $this->getEmail(),
				"password" => $this->getPassword(),
				"pais" => $this->getPais()
			];
			
		}
	}